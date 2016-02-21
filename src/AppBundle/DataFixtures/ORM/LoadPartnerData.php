<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Partner;

class LoadPartnerData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
		static $list=array(
			'CyberPC' => [
				'systName'=>'cyberpc', 
				'description'=>'CyberPC est un site de vente de matériel informatique, accessoires, drones... Basé au Taillan Medoc, à 30min du centre de Bordeaux, CyberPC se déplace pour tout dépannage informatique dans un secteur de 2h autour de son siège social.'
			],
			'Société Générale' => [
				'systName'=>'sogen', 
				'description'=>''
			],
			'CGI' => [
				'systName'=>'cgi', 
				'description'=>''
			],
			'Université de Bordeaux' => [
				'systName'=>'universite', 
				'description'=>''
			],
			'Fonds de Solidarité et Développement des Initiatives Etudiantes' => [
				'systName'=>'fsdie', 
				'description'=>''
			],
		);
		
		foreach($list as $name=>$systname)
		{
	        $partner = new Partner();
	        $partner->setName($name);
	        $partner->setSystName($systname['systName']);
			$partner->setDescription($systname['description']);
	        $manager->persist($partner);
        	$manager->flush();
		}
        
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 3;
    }
}