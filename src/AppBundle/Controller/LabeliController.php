<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Labeli;
use AppBundle\Form\LabeliType;

/**
 * Labeli controller.
 *
 */
class LabeliController extends Controller
{

    /**
     * Lists all Labeli entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Labeli')->findAll();

        return $this->render('AppBundle:labeli:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Labeli entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Labeli();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('labeli_show', array('id' => $entity->getId())));
        }

        return $this->render('AppBundle:labeli:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Labeli entity.
     *
     * @param Labeli $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Labeli $entity)
    {
        $form = $this->createForm(new LabeliType(), $entity, array(
            'action' => $this->generateUrl('labeli_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Labeli entity.
     *
     */
    public function newAction()
    {
        $entity = new Labeli();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppBundle:labeli:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Labeli entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Labeli')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Labeli entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:labeli:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Labeli entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Labeli')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Labeli entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:labeli:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Labeli entity.
    *
    * @param Labeli $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Labeli $entity)
    {
        $form = $this->createForm(new LabeliType(), $entity, array(
            'action' => $this->generateUrl('labeli_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Labeli entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Labeli')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Labeli entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('labeli_edit', array('id' => $id)));
        }

        return $this->render('AppBundle:labeli:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Labeli entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Labeli')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Labeli entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('labeli'));
    }

    /**
     * Creates a form to delete a Labeli entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('labeli_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
	
    public function byNoCotisationAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
		    'SELECT p
		    FROM AppBundle:Labeli p
		    where p.noCotisation =1'
		);
		$labeliNoCotis = $query->getResult();

        return $this->render('AppBundle:labeli:index.html.twig', array(
            'entities' => $labeliNoCotis,
        ));
    }
	
    public function byHonoredAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
		    'SELECT p
		    FROM AppBundle:Labeli p
		    where p.honored =1'
		);
		$labeliHonored = $query->getResult();

        return $this->render('AppBundle:labeli:index.html.twig', array(
            'entities' => $labeliHonored,
        ));
    }
}
