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

class ApplicationListener
{
    /**
     * @var EntityManager
     */
    protected $em;
    private $router;

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var StatusHistoryHandler
     */
    protected $statusHistoryHandler;

    /**
     * @var InsertingFile
     */
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
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $this->init();
        $entity = $args->getEntity();
        if ($entity instanceof Application) {
            $this->checkMultipleApplication($entity);
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