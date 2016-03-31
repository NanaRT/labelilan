<?php
namespace AppBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\Application;
use AppBundle\Entity\Player;
use AppBundle\Entity\Validation;
use AppBundle\Entity\Team;
use AppBundle\Entity\Labeli;
use AppBundle\Entity\User;

class ApplicationListener
{
    protected $em;
    private $router;
    protected $container;
    protected $statusHistoryHandler;
    protected $insertingFile;

    public function __construct(ContainerInterface $container, UrlGeneratorInterface $router)
    {
        // We use container directly in order to avoid a CircularReferenceException
        $this->container = $container;
        $this->router = $router;
    }

    public function init()
    {
        $this->em = $this->container->get('doctrine')->getManager();
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $this->init();
        $entity = $args->getEntity();
        if ($entity instanceof Application)
        {
            $this->checkMultipleApplication($entity);
        }
		elseif ($entity instanceof Validation) 
		{
			$this->setWaitingList($entity);
		
		}
		elseif ($entity instanceof Labeli)
		{
			$this->checkOtherLabeli($entity);
		}
		elseif ($entity instanceof User)
		{
			$this->confirmUser($entity);
			$this->checkUserLabeli($entity);
		}
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $this->init();
        $entity = $args->getEntity();
        if ($entity instanceof Application) {
            $this->checkMultipleApplication($entity);
        }
    }
	
	public function confirmUser(User $user)
	{
		$mailUser = $user->getEmail();
		
		$message = \Swift_Message::newInstance()
	        ->setSubject('Confirmation inscription LGC')
	        ->setFrom('lgc@labeli.org')
	        ->setTo($mailUser)
	        ->setBody(
			    $this->container->get('templating')->render(
	                '::email/confirmation.html.twig'
	            ),
	            'text/html'
	        )
	    ;
		$this->container->get('mailer')->send($message);
	    
	    $user->setConfirmation(1);
		$this->em->persist($user);
		$this->em->flush();
	}
	
	public function checkUserLabeli(User $user)
	{
		$userNom = strtolower ($user->getNom());
		$userPrenom = strtolower ($user->getPrenom());
		$userMail = strtolower ($user->getEmail());
		
		$labelis = $this->em->getRepository('AppBundle:Labeli')->findAll();
		
		foreach($labelis as $labeli)
		{
			$labeliNom = strtolower ($labeli->getNom());
			$labeliPrenom = strtolower ($labeli->getPrenom());
			$labeliMail = strtolower ($labeli->getMail());
			
			if((($userNom==$labeliNom)&&($userPrenom==$labeliPrenom))
				 || (($userPrenom==$labeliNom)&&($userNom==$labeliPrenom)) || $userMail==$labeliMail)
			{
				if($labeli->getHonored()==1)
				{
					$subject='Confirmation Invités d\'Honneur LGC';
					$template='::email/honored.html.twig';
				}
				else {
					$subject='Confirmation participant Label[i]';
					$template='::email/labeli.html.twig';
				}
			    $user->setPayed(1);
				$this->em->flush();
				
				$mailUser = $user->getEmail();
				
				$message = \Swift_Message::newInstance()
			        ->setSubject($subject)
			        ->setFrom('lgc@labeli.org')
			        ->setTo($userMail)
			        ->setBody(
			            $this->container->get('templating')->render(
			                $template
			            ),
			            'text/html'
			        )
			    ;
			    $this->container->get('mailer')->send($message);
				
			    $user->setMailPayed(1);
				$this->em->persist($user);
				$this->em->flush();
			}
		}
	}
	
	public function checkOtherLabeli(Labeli $labeli)
	{
		$labelis = $this->em->getRepository('AppBundle:Labeli')->findAll();
		
		foreach($labelis as $listedLabeli)
		{
			if($listedLabeli==$labeli)
			{
				return;
			}
			elseif(($listedLabeli->getNom())==($labeli->getNom()) && ($listedLabeli->getPrenom())==($labeli->getPrenom()))
			{
				if(($listedLabeli->getHonored()==true)or($labeli->getHonored()==true))
				{
					$labeli->setHonored(true);
				}
				if(($labeli->getMail()==null) && $listedLabeli->getMail()!=null)
				{
					$labeli->setMail($listedLabeli->getMail());
				}
				$this->em->persist($labeli);
				$this->em->remove($listedLabeli);
				$this->em->flush();
				return;
			}
			elseif (($listedLabeli->getMail())==($labeli->getMail()) && ($listedLabeli->getMail()!=null) && ($labeli->getMail()!=null))
			{
				if(($listedLabeli->getHonored()==true)or($labeli->getHonored()==true))
				{
					$labeli->setHonored(true);
					$this->em->persist($labeli);
				}
				$this->em->remove($listedLabeli);
				$this->em->flush();
				return;
			}
		}
	}
	
	public function checkMultipleApplication(Application $application)
	{
		$team = $application->getTeam()->getId();
		$user = ' and p.user = '.($application->getUser()->getId());
		
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Application p
		    WHERE p.team = '.$team.$user.
		    'and p.origin=\'team\''
		);
		$appTeams = $query->getResult();
		
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Application p
		    WHERE p.team = '.$team.$user.
		    'and p.origin=\'player\''
		);
		$appPlayers = $query->getResult();
		
		if($appTeams && $appPlayers)
		{
			foreach ($appTeams as $appTeam) 
			{
				foreach($appPlayers as $appPlayer)
				{
					if(($appTeam->getTeam()==$appPlayer->getTeam())
					&& ($appTeam->getUser()==$appPlayer->getUser()))
					{
						$user = $appTeam->getUser();
						$team = $appTeam->getTeam();
						$game = $team->getGame();
						
				        $query = $this->em->createQuery(
						    'SELECT p
						    FROM AppBundle:Player p
						    WHERE p.user = '.$user->getId().
						    'and p.game = '.$game->getId()
						);
						$players = $query->getResult();
						$player = $players[0];
						$player->setTeam($team);
						
						$this->em->remove($appTeam);
						$this->em->remove($appPlayer);
						$this->em->persist($player);
						$this->em->flush();
						return;
					}
				}
			}
		}
	}
}