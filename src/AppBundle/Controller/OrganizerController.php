<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Organizer;
use AppBundle\Form\OrganizerType;
use AppBundle\Repository\OrganizerRepository;

/**
 * Organizer controller.
 *
 */
class OrganizerController extends Controller
{
    /**
     * Lists all Organizer entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $organizers = $em->getRepository('AppBundle:Organizer')->findAll();

        return $this->render('AppBundle:organizer:index.html.twig', array(
            'organizers' => $organizers,
        ));
    }

    /**
     * Creates a new Organizer entity.
     *
     */
    public function newAction(Request $request)
    {
        $organizer = new Organizer();
        $form = $this->createForm(new OrganizerType(), $organizer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($organizer);
            $em->flush();

            return $this->redirectToRoute('organizer_show', array('id' => $organizer->getId()));
        }

        return $this->render('AppBundle:organizer:new.html.twig', array(
            'organizer' => $organizer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Organizer entity.
     *
     */
    public function showAction(Organizer $organizer)
    {
        $deleteForm = $this->createDeleteForm($organizer);

        return $this->render('AppBundle:organizer:show.html.twig', array(
            'organizer' => $organizer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Organizer entity.
     *
     */
    public function editAction(Request $request, Organizer $organizer)
    {
        $deleteForm = $this->createDeleteForm($organizer);
        $editForm = $this->createForm(new OrganizerType(), $organizer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($organizer);
			
			foreach($organizer->getGame() as $game)
			{
				$game->setOrganizer($organizer);
				$em->persist($game);
			}
			
            $em->flush();

            return $this->redirectToRoute('organizer_edit', array('id' => $organizer->getId()));
        }

        return $this->render('AppBundle:organizer:edit.html.twig', array(
            'organizer' => $organizer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Organizer entity.
     *
     */
    public function deleteAction(Request $request, Organizer $organizer)
    {
        $form = $this->createDeleteForm($organizer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($organizer);
            $em->flush();
        }

        return $this->redirectToRoute('organizer_index');
    }

    /**
     * Creates a form to delete a Organizer entity.
     *
     * @param Organizer $organizer The Organizer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Organizer $organizer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('organizer_delete', array('id' => $organizer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
