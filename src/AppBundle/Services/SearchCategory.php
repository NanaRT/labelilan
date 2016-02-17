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
	
	public function getInterest($userId, $gameId)
	{
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Interest p
		    where p.user = '.$userId.
		    ' and p.game = '.$gameId
		);
		$interest = $query->getResult();
		if(empty($interest))
		{
			return 0;
		}
		else{
			return 1;
		}
	}
	
	public function getNumberInterest( $gameId)
	{
        $query = $this->em->createQuery(
		    'SELECT p
		    FROM AppBundle:Interest p
		    where p.game = '.$gameId
		);
		$interest = $query->getResult();
		return count($interest);
	}
}
