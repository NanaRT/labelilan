<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Ordering;
use AppBundle\Form\OrderingType;

/**
 * Ordering controller.
 *
 */
class OrderingController extends Controller
{

    /**
     * Lists all Ordering entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Ordering')->findAll();

        return $this->render('AppBundle:Ordering:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Ordering entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Ordering();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ordering_show', array('id' => $entity->getId())));
        }

        return $this->render('AppBundle:Ordering:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Ordering entity.
     *
     * @param Ordering $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm($listOrdering,$pizza)
    {
        $form = $this->createForm(new OrderingType($pizza), $listOrdering, array(
            'action' => $this->generateUrl('ordering_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Ordering entity.
     *
     */
    public function newAction($userId)
    {
        $em = $this->getDoctrine()->getManager();
        $pizzas = $em->getRepository('AppBundle:Pizza')->findAll();
		$user = $this->getDoctrine()
        ->getRepository('AppBundle:User')
        ->find($userId);
		
		foreach ($pizzas as $pizza)
		{
			
	        $entity = new Ordering();
			$nameOrdering=('ordering'.$pizza->getId());
			$listOrdering[$nameOrdering]=array($nameOrdering=>$entity);
			$entity->setUser($user);
			$entity->setPizza($pizza);
		}
		
	    $form = $this->createCreateForm($listOrdering,$pizza);
		$arrayView=array('form'=>$form->createView());

        return $this->render('AppBundle:Ordering:new.html.twig', $arrayView);
    }

    /**
     * Finds and displays a Ordering entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Ordering')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ordering entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:Ordering:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Ordering entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Ordering')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ordering entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:Ordering:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Ordering entity.
    *
    * @param Ordering $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Ordering $entity)
    {
        $form = $this->createForm(new OrderingType(), $entity, array(
            'action' => $this->generateUrl('ordering_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Ordering entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Ordering')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ordering entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ordering_edit', array('id' => $id)));
        }

        return $this->render('AppBundle:Ordering:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Ordering entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Ordering')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ordering entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ordering'));
    }

    /**
     * Creates a form to delete a Ordering entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ordering_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
