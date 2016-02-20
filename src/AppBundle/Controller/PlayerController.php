<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Player;
use AppBundle\Form\PlayerType;

/**
 * Player controller.
 *
 */
class PlayerController extends Controller
{
    /**
     * Lists all Player entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $players = $em->getRepository('AppBundle:Player')->findAll();

        return $this->render('AppBundle:player:index.html.twig', array(
            'players' => $players,
        ));
    }

    /**
     * Creates a new Player entity.
     *
     */
    public function newAction(Request $request)
    {
		$userId = $request->attributes->get('userId');
		$gameId = $request->attributes->get('gameId');
		
        $player = new Player();
		
		 $user = $this->getDoctrine()
        ->getRepository('AppBundle:User')
        ->find($userId);
		
		$player->setUser($user);
		
		 $game = $this->getDoctrine()
        ->getRepository('AppBundle:Game')
        ->find($gameId);
		
		$player->setGame($game);
		
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();
			
			 $category = $this->getDoctrine()
	        ->getRepository('AppBundle:Category')
	        ->find($game->getCategory()->getId());
			
			return $this->redirectToRoute('game_show', array('id' => $gameId));
        }

        return $this->render('AppBundle:player:new.html.twig', array(
            'player' => $player,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Player entity.
     *
     */
    public function showAction(Player $player)
    {
        $deleteForm = $this->createDeleteForm($player);

        return $this->render('AppBundle:player:show.html.twig', array(
            'player' => $player,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Player entity.
     *
     */
    public function editAction(Request $request, Player $player)
    {
        $deleteForm = $this->createDeleteForm($player);
        $editForm = $this->createForm('AppBundle\Form\PlayerType', $player);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();

            return $this->redirectToRoute('player_edit', array('id' => $player->getId()));
        }

        return $this->render('AppBundle:player:edit.html.twig', array(
            'player' => $player,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Player entity.
     *
     */
    public function deleteAction($id)
    {
		 $player = $this->getDoctrine()
        ->getRepository('AppBundle:Player')
        ->find($id);
		
        $em = $this->getDoctrine()->getManager();
        $em->remove($player);
        $em->flush();

		return $this->forward('AppBundle:User:show', array(
	        'id'  => $this->getUser()->getId()
	    ));;
    }
	
	public function freePlayerAction($userId, $gameId)
	{
		$player = new Player();
		
		 $user = $this->getDoctrine()
        ->getRepository('AppBundle:User')
        ->find($userId);
		
		$player->setUser($user);
		
		 $game = $this->getDoctrine()
        ->getRepository('AppBundle:Game')
        ->find($gameId);
		
		$player->setGame($game);
		
        $em = $this->getDoctrine()->getManager();
        $em->persist($player);
        $em->flush();
        return $this->redirectToRoute('labelilan');
	}
}
