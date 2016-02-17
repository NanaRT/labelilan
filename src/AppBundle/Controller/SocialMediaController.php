<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\SocialMedia;
use AppBundle\Form\SocialMediaType;

/**
 * SocialMedia controller.
 *
 */
class SocialMediaController extends Controller
{
    /**
     * Lists all SocialMedia entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $socialMedia = $em->getRepository('AppBundle:SocialMedia')->findAll();

        return $this->render('AppBundle:socialMedia:index.html.twig', array(
            'socialMedia' => $socialMedia,
        ));
    }

    /**
     * Creates a new SocialMedia entity.
     *
     */
    public function newAction(Request $request)
    {
        $socialMedia = new SocialMedia();
        $form = $this->createForm('AppBundle\Form\SocialMediaType', $socialMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($socialMedia);
            $em->flush();
        }

        return $this->render('AppBundle:socialmedia:new.html.twig', array(
            'socialMedia' => $socialMedia,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SocialMedia entity.
     *
     */
    public function showAction(SocialMedia $socialMedia)
    {
        $deleteForm = $this->createDeleteForm($socialMedia);

        return $this->render('AppBundle:socialmedia:show.html.twig', array(
            'socialMedia' => $socialMedia,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SocialMedia entity.
     *
     */
    public function editAction(Request $request, SocialMedia $socialMedia)
    {
        $deleteForm = $this->createDeleteForm($socialMedia);
        $editForm = $this->createForm('AppBundle\Form\SocialMediaType', $socialMedia);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($socialMedia);
            $em->flush();

            return $this->redirectToRoute('socialmedia_edit', array('id' => $socialMedia->getId()));
        }

        return $this->render('AppBundle:socialmedia:edit.html.twig', array(
            'socialMedia' => $socialMedia,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SocialMedia entity.
     *
     */
    public function deleteAction(Request $request, SocialMedia $socialMedia)
    {
        $form = $this->createDeleteForm($socialMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($socialMedia);
            $em->flush();
        }

        return $this->redirectToRoute('socialmedia_index');
    }

    /**
     * Creates a form to delete a SocialMedia entity.
     *
     * @param SocialMedia $socialMedia The SocialMedia entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SocialMedia $socialMedia)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('socialmedia_delete', array('id' => $socialMedia->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
