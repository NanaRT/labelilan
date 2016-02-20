<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Category;

class LoadCategoryData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
		static $list=array(
			'Tournois Multijoueurs' => 'multi',
			'Tournois Solos'=> 'solo',
			'Jeux Libres'=> 'libre',
			'Autre'=> 'autre',
		);
		
		foreach($list as $name=>$systname)
		{
	        $category = new Category();
	        $category->setName($name);
	        $category->setSystName($systname);
	        $manager->persist($category);
        	$manager->flush();
		}
        
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}