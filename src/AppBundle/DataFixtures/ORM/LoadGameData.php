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
			'League of Legends' => [
				'systName'    => 'lol',
				'description' => '
				',
				'places'      => '16',
				'nbplayers'    => '5',
				],
			'Counter Strike : Global Warfare'=> [
				'systName'    => 'csgo',
				'description' => '
				',
				'places'      => '16',
				'nbplayers'    => '5',
				],
			'Heroes Of The Storm'=> [
				'systName'    => 'hots',
				'description' => '
				',
				'places'      => '16',
				'nbplayers'    => '5',
				],
			'Awesomenauts '=> [
				'systName'    => 'awesomenauts',
				'description' => '
				',
				'places'      => '16',
				'nbplayers'    => '3',
				],
			'Rocket League'=> [
				'systName'    => 'rl',
				'description' => '
				',
				'places'      => '16',
				'nbplayers'    => '3',
				],
			'Team Fortress 2 '=> [
				'systName'    => 'tf2',
				'description' => '',
				'places'      => '16',
				'nbplayers'    => '5',
				],
			'Hearthstone'=> [
				'systName'    => 'hearthstone',
				'description' => '
				',
				'places'      => '64',
				],
			'Super Smash Bros'=> [
				'systName'    => 'smash',
				'description' => '
				',
				],
			'Mario Smash Football'=> [
				'systName'    => 'mariofoot',
				'description' => '',
				],
			'Street Fighter V'=> [
				'systName'    => 'streetfighter',
				'description' => '',
				],
			'Splatoon'=> [
				'systName'    => 'splatoon',
				'description' => '',
				],
			'Starcraft 2'=> [
				'systName'    => 'starcraft',
				'description' => '',
				],
			'Guitar Hero'=> [
				'systName'    => 'guitarhero',
				'description' => '',
				],
			'Rock Band'=> [
				'systName'    => 'rockband',
				'description' => '',
				],
			'Super Smash Bros. Melee'=> [
				'systName'    => 'smashmelee',
				'description' => '',
				],
			'Mario Kart 8'=> [
				'systName'    => 'mkart',
				'description' => '',
				],
			'Stepmania'=> [
				'systName'    => 'stepmania',
				'description' => '',
				],
			'Osu'=> [
				'systName'    => 'osu',
				'description' => '',
				],
			'Trackmania'=> [
				'systName'    => 'trackmania',
				'description' => '',
				],
			'Oculus Rift'=> [
				'systName'    => 'oculus',
				'description' => '',
				],
			'Jeux de société'=> [
				'systName'    => 'jds',
				'description' => '',
				],
			'Jeu de rôle'=> [
				'systName'    => 'jdr',
				'description' => '',
				]
		);
		
		foreach($list as $name=>$systname)
		{
	        $game = new Game();
	        $game->setName($name);
	        $game->setSystName($systname['systName']);
	        $game->setDescription($systname['description']);
			if(array_key_exists('places', $systname))
			{
				$game->setPlaces($systname['places']);
			}
			if(array_key_exists('nbplayers',$systname))
			{
	        	$game->setNbplayers($systname['nbplayers']);
			}
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