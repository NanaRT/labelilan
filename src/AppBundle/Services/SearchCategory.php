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
		    where p.user = '.$userId.
		    ' and p.game = '.$gameId.'
		     and p.team is null'
		);
		$soloPlayer = $query->getResult();
		
		var_dump($soloPlayer);exit;
		
		return $soloPlayer;
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
		if(count($placesTaken)<$game->getPlaces())
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
		     and p.validation is null'
		);
		$placesTaken = $query->getResult();
		
		$game = $this->em->getRepository('AppBundle\Entity\Game')->find($gameId);
		
		return $game->getPlaces()-count($placesTaken);
	}
}
