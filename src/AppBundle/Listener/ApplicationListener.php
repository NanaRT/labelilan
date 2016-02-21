<?php
namespace AppBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerInterface;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\Application;
use AppBundle\Entity\Player;
use AppBundle\Entity\Validation;
use AppBundle\Entity\Team;

class ApplicationListener
{
    /**
     * @var EntityManager
     */
    protected $em;

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

    public function __construct(ContainerInterface $container)
    {
        // We use container directly in order to avoid a CircularReferenceException
        $this->container = $container;
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
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $this->init();
        $entity = $args->getEntity();
        if ($entity instanceof Application) {
            $this->checkMultipleApplication($entity);
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