<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Application;
use AppBundle\Form\ApplicationType;

/**
 * Application controller.
 *
 */
class ApplicationController extends Controller
{
    /**
     * Lists all Application entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $applications = $em->getRepository('AppBundle:Application')->findAll();

        return $this->render('AppBundle:application:index.html.twig', array(
            'applications' => $applications,
        ));
    }

    /**
     * Creates a new Application entity.
     *
     */
    public function newAction(Request $request)
    {
		$userId = $request->attributes->get('user');
		$teamId = $request->attributes->get('team');
		$origin = $request->attributes->get('origin');
		
        $application = new Application();
		
		 $user = $this->getDoctrine()
        ->getRepository('AppBundle:User')
        ->find($userId);
		
		 $team = $this->getDoctrine()
        ->getRepository('AppBundle:Team')
        ->find($teamId);
		
		$application->setUser($user);
		$application->setTeam($team);
		$application->setOrigin($origin);
		
        $form = $this->createForm('AppBundle\Form\ApplicationType', $application);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($application);
            $em->flush();

            return $this->redirectToRoute('game_show', array('id' => $team->getGame()->getId()));
        }

        return $this->render('AppBundle:application:new.html.twig', array(
            'application' => $application,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Application entity.
     *
     */
    public function showAction(Application $application)
    {
        $deleteForm = $this->createDeleteForm($application);

        return $this->render('AppBundle:application:show.html.twig', array(
            'application' => $application,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Application entity.
     *
     */
    public function editAction(Request $request, Application $application)
    {
        $editForm = $this->createForm('AppBundle\Form\ApplicationType', $application);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($application);
            $em->flush();
			
            return $this->redirectToRoute('application_edit', array('id' => $application->getId()));
        }

        return $this->render('AppBundle:application:edit.html.twig', array(
            'application' => $application,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a Application entity.
     *
     */
    public function deleteAction($id,$originId,$origin)
    {
		 $application = $this->getDoctrine()
        ->getRepository('AppBundle:Application')
        ->find($id);
		
        $em = $this->getDoctrine()->getManager();
        $em->remove($application);
        $em->flush();
		
		if($origin=='team')
		{
			 $team = $this->getDoctrine()
	        ->getRepository('AppBundle:Team')
	        ->find($originId);
			
			return $this->forward('AppBundle:Team:show', array(
		        'team'  => $team
		    ));;
		}
		elseif($origin =='player') 
		{
			 $user= $this->getDoctrine()
	        ->getRepository('AppBundle:User')
	        ->find($originId);
			
			return $this->forward('AppBundle:User:show', array(
		        'user'  => $user
		    ));;
		}
    }
}
