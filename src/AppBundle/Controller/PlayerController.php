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
        $games = $em->getRepository('AppBundle:Game')->findAll();
		
        return $this->render('AppBundle:player:index.html.twig', array(
            'players' => $players,
            'games' => $games,
        ));
    }
	
	public function byGamePayedAction($game)
	{
        $em = $this->getDoctrine()->getManager();

        $games = $em->getRepository('AppBundle:Game')->findAll();
        $query = $em->createQuery(
		    'SELECT p
		    FROM AppBundle:Player p
		    inner join AppBundle:User u
		    with u.id=p.user
		    where p.game='.$game.'
		     and u.payed=1'
		);
		$players = $query->getResult();
		
        return $this->render('AppBundle:player:index.html.twig', array(
            'players' => $players,
            'games' => $games,
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
		
        $form = $this->createForm(new PlayerType(), $player);
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
            'game'   => $game,
            'form'   => $form->createView(),
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
        $editForm = $this->createForm(new PlayerType(), $player);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();

            return $this->redirectToRoute('user_show', array('id' => $player->getUser()->getId()));
        }

        return $this->render('AppBundle:player:edit.html.twig', array(
            'player' => $player,
            'edit_form' => $editForm->createView()
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
	
	public function freePlayerAction($userId, $gameId, $origin)
	{
		$player = new Player();
		
		 $user = $this->getDoctrine()
        ->getRepository('AppBundle:User')
        ->find($userId);
		
		$player->setUser($user);
		
		 $game = $this->getDoctrine()
        ->getRepository('AppBundle:Game')
        ->find($gameId);
		
		$systName=$game->getSystName();
		
		$player->setGame($game);
		
        $em = $this->getDoctrine()->getManager();
        $em->persist($player);
        $em->flush();
		
		if($origin=='index')
		{
        	return $this->redirectToRoute('labelilan');
		}
		elseif ($origin=='show') 
		{
        	return $this->redirectToRoute('game_show', ['id'=>$game->getId()]);
		}
	}
}
