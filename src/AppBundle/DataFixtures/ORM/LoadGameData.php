<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Game;

class LoadGameData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
		static $list=array(
			'League of Legends' => 'lol',
			'Counter Strike : Global Warfare'=> 'csgo',
			'Hearthstone'=> 'hearthstone',
			'Super Smash Bros'=> 'smash',
			'Mario Kart'=> 'mkart',
			'Trackmania'=> 'trackmania',
			'Guitar Hero'=> 'guitarhero',
			'Rock Band'=> 'rockband',
		);
		
		foreach($list as $name=>$systname)
		{
	        $game = new Game();
	        $game->setName($name);
	        $game->setSystName($systname);
	        $manager->persist($game);
        	$manager->flush();
		}
        
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}