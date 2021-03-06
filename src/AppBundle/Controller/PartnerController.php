<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Partner;
use AppBundle\Form\PartnerType;

/**
 * Partner controller.
 *
 */
class PartnerController extends Controller
{
    /**
     * Lists all Partner entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $partners = $em->getRepository('AppBundle:Partner')->findAll();

        return $this->render('AppBundle:partner:index.html.twig', array(
            'partners' => $partners,
        ));
    }

    /**
     * Creates a new Partner entity.
     *
     */
    public function newAction(Request $request)
    {
        $partner = new Partner();
        $form = $this->createForm(new PartnerType(), $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($partner);
            $em->flush();

            return $this->redirectToRoute('partner_show', array('id' => $partner->getId()));
        }

        return $this->render('AppBundle:partner:new.html.twig', array(
            'partner' => $partner,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Partner entity.
     *
     */
    public function showAction(Partner $partner)
    {
        $deleteForm = $this->createDeleteForm($partner);

        return $this->render('AppBundle:partner:show.html.twig', array(
            'partner' => $partner,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Partner entity.
     *
     */
    public function editAction(Request $request, Partner $partner)
    {
        $deleteForm = $this->createDeleteForm($partner);
        $editForm = $this->createForm(new PartnerType(), $partner);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($partner);
            $em->flush();

            return $this->redirectToRoute('partner_edit', array('id' => $partner->getId()));
        }

        return $this->render('AppBundle:partner:edit.html.twig', array(
            'partner' => $partner,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Partner entity.
     *
     */
    public function deleteAction(Request $request, Partner $partner)
    {
        $form = $this->createDeleteForm($partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($partner);
            $em->flush();
        }

        return $this->redirectToRoute('partner_index');
    }

    /**
     * Creates a form to delete a Partner entity.
     *
     * @param Partner $partner The Partner entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Partner $partner)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('partner_delete', array('id' => $partner->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
