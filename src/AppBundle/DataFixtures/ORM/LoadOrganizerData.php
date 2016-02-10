<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Organizer;

class LoadOrganizerData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
		static $list=array(
			'Association Bordelaise des Geeks et Gamers' => 'AB2G',
			'La Guilde du Délibéré' => 'GDD',
			'Bordeaux Unites Gamers' => 'BUG',
			'Tagazoo Club de Talence' => 'TCT',
		);
		
		foreach($list as $name=>$systname)
		{
	        $organizer = new Organizer();
	        $organizer->setName($name);
	        $organizer->setSystName($systname);
	        $manager->persist($organizer);
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