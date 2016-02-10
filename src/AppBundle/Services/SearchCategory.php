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
}
