<?php

namespace AppBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SearchCategory
{
	public function __construct(\Doctrine\ORM\EntityManager $em)
	{
	  $this->em = $em;
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
		    FROM AppBundle:Player p
		    where p.game = '.$gameId
		);
		$placesTaken = $query->getResult();
		
		$game = $this->em->getRepository('AppBundle\Entity\Game')->find($gameId);
		if(count($placesTaken)<$game->getPlaces() or $game->getPlaces()==null)
		{
			return 1;
		}
		else
		{
			return 0;
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
}
