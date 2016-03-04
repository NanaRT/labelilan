<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function accueilAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('AppBundle:Category')->findAll();
        return $this->render('::default/index.html.twig', array(
            'categories' => $categories
        ));
    }
	
    public function informationsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $partners = $em->getRepository('AppBundle:Partner')->findAll();
        $organizers = $em->getRepository('AppBundle:Organizer')->findAll();
        return $this->render('::default/informations.html.twig', array(
            'partners' => $partners,
            'organizers' => $organizers
        ));
    }
	
	public function downloadReglementPdfAction()
	{
		$fichier = "Reglements lgc.pdf";
	    $chemin = "bundles/app/doc/"; // emplacement de votre fichier .pdf
	         
	    $response = new Response();
	    $response->setContent(file_get_contents($chemin.$fichier));
	    $response->headers->set('Content-Type', 'application/force-download'); // modification du content-type pour forcer le téléchargement (sinon le navigateur internet essaie d'afficher le document)
	    $response->headers->set('Content-disposition', 'filename='. $fichier);
	         
	    return $response;
	}
	
	public function getValidationTeamsAction()
	{
        $em = $this->getDoctrine()->getManager();
		
        $query = $em->createQuery(
		    'SELECT p
		    FROM AppBundle:Team p
		    order by p.game'
		);
		$teams = $query->getResult();
		
        return $this->render('::default/getValidationTeams.html.twig', array(
            'teams' => $teams
        ));
	}
}
