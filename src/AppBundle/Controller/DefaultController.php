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
        $games = $em->getRepository('AppBundle:Game')->findAll();
        return $this->render('::default/informations.html.twig', array(
            'partners' => $partners,
            'organizers' => $organizers,
            'games'=>$games
        ));
    }
	
	public function downloadReglementPdfAction()
	{
		$fichier = "ReglementsLGC.pdf";
	    $chemin = "bundles/app/doc/"; // emplacement de votre fichier .pdf
	         
	    $response = new Response();
	    $response->setContent(file_get_contents($chemin.$fichier));
	    $response->headers->set('Content-Type', 'application/force-download'); // modification du content-type pour forcer le téléchargement (sinon le navigateur internet essaie d'afficher le document)
	    $response->headers->set('Content-disposition', 'filename='. $fichier);
	         
	    return $response;
	}
	
	public function downloadPokemonAction()
	{
		$fichier = "pokemon_inscription.pdf";
	    $chemin = "bundles/app/doc/"; // emplacement de votre fichier .pdf
	         
	    $response = new Response();
	    $response->setContent(file_get_contents($chemin.$fichier));
	    $response->headers->set('Content-Type', 'application/force-download'); // modification du content-type pour forcer le téléchargement (sinon le navigateur internet essaie d'afficher le document)
	    $response->headers->set('Content-disposition', 'filename='. $fichier);
	         
	    return $response;
	}
	
	public function downloadDroitImageAction()
	{
		$fichier = "autorisation_d_utilisation_de_l_image_d_une_personne.pdf";
	    $chemin = "bundles/app/doc/droit_image/"; // emplacement de votre fichier .pdf
	         
	    $response = new Response();
	    $response->setContent(file_get_contents($chemin.$fichier));
	    $response->headers->set('Content-Type', 'application/force-download'); // modification du content-type pour forcer le téléchargement (sinon le navigateur internet essaie d'afficher le document)
	    $response->headers->set('Content-disposition', 'filename='. $fichier);
	         
	    return $response;
	}
	
	public function downloadDroitImageMineurAction()
	{
		$fichier = "autorisation_d_utilisation_de_l_image_d_un_mineur.pdf";
	    $chemin = "bundles/app/doc/droit_image/"; // emplacement de votre fichier .pdf
	         
	    $response = new Response();
	    $response->setContent(file_get_contents($chemin.$fichier));
	    $response->headers->set('Content-Type', 'application/force-download'); // modification du content-type pour forcer le téléchargement (sinon le navigateur internet essaie d'afficher le document)
	    $response->headers->set('Content-disposition', 'filename='. $fichier);
	         
	    return $response;
	}
	
	public function downloadAccordParentalAction()
	{
		$fichier = "autorisation_parentale.pdf";
	    $chemin = "bundles/app/doc/droit_image/"; // emplacement de votre fichier .pdf
	         
	    $response = new Response();
	    $response->setContent(file_get_contents($chemin.$fichier));
	    $response->headers->set('Content-Type', 'application/force-download'); // modification du content-type pour forcer le téléchargement (sinon le navigateur internet essaie d'afficher le document)
	    $response->headers->set('Content-disposition', 'filename='. $fichier);
	         
	    return $response;
	}
	
    public function mentionsLegalesAction()
    {
        return $this->render('::default/mentionsLegales.html.twig');
    }
	
	public function lostPasswordAction(Request $request)
	{
        $form = $this->createFormBuilder()
            ->add('identifier', 'text',['label'=>'Email ou Username'])
            ->add('save', 'submit', array('label' => 'Envoyer'))
            ->getForm();
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
        	$em = $this->getDoctrine()->getManager();
        	$data = $request -> request->all();
			$form = $data['form'];
			$identifier = $form['identifier'];
			
			$user = $this->get('fos_user.user_manager')->findUserByUsernameOrEmail($identifier);
			
	        if (null === $user) {
	            return $this->render('FOSUserBundle:Resetting:request.html.twig', array(
	                'invalid_username' => $username
	            ));
	        }
	
	        if ($user->isPasswordRequestNonExpired($this->container->getParameter('fos_user.resetting.token_ttl'))) {
	            return $this->render('FOSUserBundle:Resetting:passwordAlreadyRequested.html.twig');
	        }
			
	        if (null === $user->getConfirmationToken()) {
	            /** @var $tokenGenerator \FOS\UserBundle\Util\TokenGeneratorInterface */
	            $tokenGenerator = $this->get('fos_user.util.token_generator');
	            $user->setConfirmationToken($tokenGenerator->generateToken());
	        }
	
	        $this->get('fos_user.mailer')->sendResettingEmailMessage($user);
	        $user->setPasswordRequestedAt(new \DateTime());
	        $this->get('fos_user.user_manager')->updateUser($user);
	
	        return $this->render('FOSUserBundle:Resetting:passwordAlreadyRequested.html.twig');
        }

        return $this->render('default/lostPassword.html.twig', array(
            'form' => $form->createView(),
        ));
	}
}
