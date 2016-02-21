<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\SocialMedia;

class LoadSocialMediaData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
		static $list=array(
			'Site AB2G' => [
				'link'    => 'http://www.asso-b2g.com/',
				'icon'    => 'globe'
				],
			'Site Label[i]' => [
				'link'    => 'http://labeli.org/',
				'icon'    => 'globe'
				],
			'Site CyberPC' => [
				'link'    => 'http://cyberpc.fr/',
				'icon'    => 'globe'
				],
			'Site Société Générale' => [
				'link'    => 'https://www.societegenerale.fr/',
				'icon'    => 'globe'
				],
			'Site CGI' => [
				'link'    => 'http://www.cgi.fr/',
				'icon'    => 'globe'
				],
			'Site Université de Bordeaux' => [
				'link'    => 'https://www.u-bordeaux.fr/',
				'icon'    => 'globe'
				],
			'Facebook GDD' => [
				'link'    => 'https://www.facebook.com/GuildeDuDeLibere/?fref=ts',
				'icon'    => 'facebook-f'
				],
			'Facebook TCT' => [
				'link'    => 'https://www.facebook.com/club.tct/?fref=ts',
				'icon'    => 'facebook-f'
				],
			'Facebook AB2G' => [
				'link'    => 'https://www.facebook.com/AssoB2G/',
				'icon'    => 'facebook-f'
				],
			'Facebook Eurythmia' => [
				'link'    => 'https://www.facebook.com/eurythmiabordeaux/?fref=ts',
				'icon'    => 'facebook-f'
				],
			'Facebook Label[i]' => [
				'link'    => 'https://www.facebook.com/assoLabeli/?fref=ts',
				'icon'    => 'facebook-f'
				],
			'Facebook cyberpc' => [
				'link'    => 'https://www.facebook.com/cyberpc.fr/?fref=ts',
				'icon'    => 'facebook-f'
				],
			'Facebook sogen' => [
				'link'    => 'https://www.facebook.com/societegenerale/?fref=ts',
				'icon'    => 'facebook-f'
				],
			'Facebook cgi' => [
				'link'    => 'https://www.facebook.com/cgigroup/?fref=ts',
				'icon'    => 'facebook-f'
				],
			'Facebook universite' => [
				'link'    => 'https://www.facebook.com/univbordeaux/?fref=ts',
				'icon'    => 'facebook-f'
				],
			'Twitter AB2G' => [
				'link'    => 'https://twitter.com/assob2g',
				'icon'    => 'twitter'
				],
			'Twitter Label[i]' => [
				'link'    => 'https://twitter.com/label_i',
				'icon'    => 'twitter'
				],
			'Twitter cyberpc' => [
				'link'    => 'https://twitter.com/CyberPCFr',
				'icon'    => 'twitter'
				],
			'Twitter sogen' => [
				'link'    => 'https://twitter.com/SocieteGenerale',
				'icon'    => 'twitter'
				],
			'Twitter cgi' => [
				'link'    => 'https://twitter.com/CGI_Global',
				'icon'    => 'twitter'
				],
			'Twitter universite' => [
				'link'    => 'https://twitter.com/univbordeaux',
				'icon'    => 'twitter'
				]
		);
		
		foreach($list as $name=>$systname)
		{
	        $socialMedia = new SocialMedia();
	        $socialMedia->setName($name);
	        $socialMedia->setLink($systname['link']);
	        $socialMedia->setIcon($systname['icon']);
	        $manager->persist($socialMedia);
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