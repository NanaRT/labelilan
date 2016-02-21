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
			'Association Bordelaise des Geeks et Gamers' => [
				'AB2G', 
				'Depuis Juillet 2015, l\'Association Bordelaise des Geeks et Gamers participe au développement de l\'e—sport et à la propagation de la culture geek dans la région bordelaise. 
				De la gestion d\'un événement à son animation, l\'AB2G couvre un large panel de missions. 
				Nous sommes également de fervents défenseurs du retour des licornes, notamment dans la rue Sainte Catherine.'
			],
			'La Guilde du Dé Libéré' => [
				'GDD',
				'Association étudiante bordelaise axée sur les jeux de rôle et de société, notre objectif est de promouvoir le jeu de rôle et de réflexion auprès des étudiants. Nous organisons des séances de jeu de rôle ainsi que des séances de jeux de société, au rythme de 2-3 soirs par semaine. Nous faisons régulièrement du Donjons et Dragons, Legends of the Five Rings et autres jeux de rôles créés par nos membres.En espérant vous voir parmi nous pour une partie !
				
				Contact: gddl@u-bordeaux.fr'
			],
			'Bordeaux Unites Gamers' => [
				'BUG',
				'Bordeaux Unites Gamers est la création de quatre Bordelais passionnés de jeux vidéos. 
				Etant des joueurs habitués aux LANs et aimant la compétition nous souhaitons combler le manque d\'évènements Esport à Bordeaux et faire partager notre passion.'
			],
			'Tagazoo Club de Talence' => [
				'TCT',
				'Association et Club depuis 2009 qui a pour but de rassembler les joueurs de Smash et Mario Kart  et autres jeux Nintendo afin d\'organiser des Tournois autour de ces jeux'
			],
			'Eurythmia' => [
				'eurythmia',
				'Eurythmia est une association de deux gamers Bordelais fan de jeux de rythme tel que Guitar hero et Rock Band. Notre but est de mettre en avant ces jeux musicaux et de les faire tester aux novices, mais aussi de permettre d\'améliorer le niveau de joueurs intermédiaires.'
			],
			'Label[i]' => [
				'labeli',
				'Notre association a pour but de réunir tous les étudiants en informatique présents à l\'université. En leur proposant un cadre pour réaliser leurs projets, nous espérons booster leur productivité et ainsi, leur donner de meilleures chances pour leur vie après les études.'
			],
		);
		
		foreach($list as $name=>$systname)
		{
	        $organizer = new Organizer();
	        $organizer->setName($name);
	        $organizer->setSystName($systname[0]);
			$organizer->setDescription($systname[1]);
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