<?php

namespace AppBundle\Services;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\UserEvent;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Services\BgfesEvents;
use AppBundle\Services\RegistrationCompleteEvent;
use Symfony\Component\HttpFoundation\RequestStack;


class RegistrationConfirmListener implements EventSubscriberInterface
{
    private $router;
    private $container;
    private $em;
	
    public function __construct(UrlGeneratorInterface $router, ContainerInterface $container,\Doctrine\ORM\EntityManager $em)
    {
        $this->router = $router;
	    $this->container = $container;
	    $this->em = $em;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',
            );
    }

    public function onRegistrationSuccess(FormEvent $event)
    {
        $url = $this->router->generate('labelilan');

        $event->setResponse(new RedirectResponse($url));
    }
}
