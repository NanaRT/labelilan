<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function accueilAction()
    {
        return $this->render('::default/index.html.twig');
    }
	
    public function informationsAction()
    {
        return $this->render('::default/informations.html.twig');
    }
}
