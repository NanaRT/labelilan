<?php

namespace AppBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Form\ApplicationType;
use AppBundle\Entity\Application;
use Symfony\Component\Form\FormFactoryInterface;

class SearchCategory
{
	public function __construct(\Doctrine\ORM\EntityManager $em,ContainerInterface $container)
	{
	  $this->em = $em;
        $this->container = $container;
	}
	
	public function getSearchingCategory()
	{
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Category p'
		);
		$categories = $query->getResult();
		return $categories;
	}
	
	public function getSearchingOrganizer()
	{
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Organizer p'
		);
		$organizers = $query->getResult();
		return $organizers;
	}
	
	public function getSearchingPartner()
	{
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Partner p'
		);
		$partners = $query->getResult();
		return $partners;
	}
	
	public function getPlayerMulti($userId)
	{
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Player p
		    inner join AppBundle:Game g
		    with g.id=p.game
		    inner join AppBundle:Category c
		    with c.id=g.category
		    where p.user = '.$userId.
		    ' and c.systName = \'multi\''
		);
		$players = $query->getResult();
		
		return $players;
	}
	
	public function getCreatedPlayer($userId, $gameId)
	{
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Player p
		    where p.user = '.$userId.
		    ' and p.game = '.$gameId
		);
		$player = $query->getResult();
		if(empty($player))
		{
			return 0;
		}
		else{
			return 1;
		}
	}
	
	public function getCreatePlayer($userId, $gameId)
	{
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Player p
		    where p.user = '.$userId.
		    ' and p.game = '.$gameId
		);
		$player = $query->getResult();
	}
	
	public function getPlayerGame($userId, $gameId)
	{
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Player p
		    where p.user = '.$userId.
		    ' and p.game = '.$gameId
		);
		$player = $query->getResult();
		return $player;
	}
	
	public function searchSoloPlayers($gameId)
	{
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Player p
		    where p.game = '.$gameId.'
		     and p.team is null'
		);
		$soloPlayers = $query->getResult();
		$randArray=array();
		$keys=array();
		
		if(empty($soloPlayers))
		{
			return;
		}
		elseif(count($soloPlayers)<=4)
		{
			return $soloPlayers;
		}
		
		for($i=0;$i<5;$i++)
		{
			$key = rand(0,count($soloPlayers)-1);
			while(in_array($key, $keys))
			{
				$key = rand(0,count($soloPlayers)-1);
			}
			$keys[$i]=$key;
			$randArray[$i]=$soloPlayers[$key];
		}
		
		return $randArray;
	}
	
	
	public function searchNotValidTeam($gameId)
	{
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Team p
		    where p.game = '.$gameId.'
		     and p.validation is null'
		);
		$notValidTeam = $query->getResult();
		$randArray=array();
		$keys=array();
		
		if(empty($notValidTeam))
		{
			return;
		}
		elseif(count($notValidTeam)<=4)
		{
			return $notValidTeam;
		}
		
		for($i=0;$i<5;$i++)
		{
			$key = rand(0,count($notValidTeam)-1);
			while(in_array($key, $keys))
			{
				$key = rand(0,count($notValidTeam)-1);
			}
			$keys[$i]=$key;
			$randArray[$i]=$notValidTeam[$key];
		}
		
		return $randArray;
	}
	
	public function getNumberPlayer($gameId)
	{
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Player p
		    where p.game = '.$gameId
		);
		$interest = $query->getResult();
		return count($interest);
	}
	
	public function checkPlaces($gameId)
	{
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Game p
		    where p.id = '.$gameId
		);
		$games = $query->getResult();
		$game = $games[0];
		if($game->getCategory()->getSystName()=='multi')
		{
	        $query = $this->em->createQuery(
			    'SELECT p
			    FROM AppBundle:Team p
			    where p.game = '.$gameId.
			    ' and p.validation is not null'
			);
			$placesTaken = $query->getResult();
			
			if(count($placesTaken)<($game->getPlaces()) or $game->getPlaces()==null)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else{
	        $query = $this->em->createQuery(
			    'SELECT p
			    FROM AppBundle:Player p
			    where p.game = '.$gameId
			);
			$placesTaken = $query->getResult();
			
			if(count($placesTaken)<$game->getPlaces() or $game->getPlaces()==null)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
	}
	public function getSoloPlaces($gameId)
	{
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Player p
		    where p.game = '.$gameId
		);
		$placesTaken = $query->getResult();
		
		$game = $this->em->getRepository('AppBundle\Entity\Game')->find($gameId);
		
		return $game->getPlaces()-count($placesTaken);
	}
	
	public function getMultiPlaces($gameId)
	{
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Team p
		    where p.game = '.$gameId.'
		     and p.validation is not null'
		);
		$placesTaken = $query->getResult();
		
		$game = $this->em->getRepository('AppBundle\Entity\Game')->find($gameId);
		
		return $game->getPlaces()-count($placesTaken);
	}
	
	public function newApplicationTeamArray($userId, $candidatId, $gameId, $origin)
	{
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Player p
		    where p.user = '.$userId.
		    ' and p.game = '.$gameId
		);
		$players = $query->getResult();
		$team = $players[0]->getTeam();
		
		$dataArray['user']=$candidatId;
		$dataArray['team']=$team->getId();
		$dataArray['origin']=$origin;
		
		return $dataArray;
	}
	
	
	public function checkApplication($userId, $gameId, $origin, $candidatId=null)
	{
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Player p
		    where p.user = '.$userId.
		    ' and p.game = '.$gameId
		);
		$players = $query->getResult();
		
		$team = $players[0]->getTeam();
		
		if($candidatId!=null)
		{
			$candidat = ' and a.user = '.$candidatId;
		}
		else {
			$candidat='';
		}
		
        $query = $this->em->createQuery(
		    'SELECT a
		    FROM AppBundle:Application a
		    where a.team = '.$players[0]->getTeam()->getId().$candidat.
		    ' and a.origin = \''.$origin.'\''
		);
		$applications = $query->getResult();
		
		if(empty($applications))
		{
			return ;
		}
		else
		{
			return $applications;
		}
	}
	
	public function checkApplicationTeam($userId, $teamId, $origin)
	{
        $query = $this->em->createQuery(
		    'SELECT a
		    FROM AppBundle:Application a
		    where a.team = '.$teamId.
		    ' and a.user = '.$userId.
		    ' and a.origin = \''.$origin.'\''
		);
		$applications = $query->getResult();
		
		if(empty($applications))
		{
			return ;
		}
		else
		{
			return $applications;
		}
	}
	
	public function checkApplicationPlayer($userId, $origin)
	{
        $query = $this->em->createQuery(
		    'SELECT a
		    FROM AppBundle:Application a
		    where a.user = '.$userId.
		    ' and a.origin = \''.$origin.'\''
		);
		$applications = $query->getResult();
		
		if(empty($applications))
		{
			return ;
		}
		else
		{
			return $applications;
		}
	}
	
	public function checkApplicationTeamPlayers($teamId, $origin)
	{
        $query = $this->em->createQuery(
		    'SELECT a
		    FROM AppBundle:Application a
		    where a.team = '.$teamId.
		    ' and a.origin = \''.$origin.'\''
		);
		$applications = $query->getResult();
		
		if(empty($applications))
		{
			return ;
		}
		else
		{
			return $applications;
		}
	}

	public function getTeams($userId)
	{
        $query = $this->em->createQuery(
		    'SELECT t
		    FROM AppBundle:Team t
		    inner join AppBundle:Player p
		    with t.id=p.team
		    where p.user = '.$userId
		);
		$teams = $query->getResult();
		
		return $teams;
	}

	public function getAllApplicationTeams($userId)
	{
        $query = $this->em->createQuery(
		    'SELECT a
		    FROM AppBundle:Application a
		    inner join AppBundle:Team t
		    with a.team = t.id
		    inner join AppBundle:Player p
		    with t.id=p.team
		    where p.user = '.$userId
		);
		$applications = $query->getResult();
		
		return $applications;
	}
	
	
	public function getCapitain($userId,$gameId,$teamId)
	{
		
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Player p
		    where p.user = '.$userId.
		    ' and p.game = '.$gameId.
		    ' and p.team = '.$teamId.
		    ' and p.capitain is not null'
		);
		$capitain = $query->getResult();
		
		if(empty($capitain))
		{
			return;
		}
		else
		{
			return 1;
		}
	}
	
	public function getPlayersInTeam($teamId)
	{
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Player p
		    where p.team = '.$teamId
		);
		$players = $query->getResult();
		return $players;
	}
}
