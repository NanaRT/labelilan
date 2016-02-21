<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Team;
use AppBundle\Form\TeamType;

/**
 * Team controller.
 *
 */
class TeamController extends Controller
{
    /**
     * Lists all Team entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $teams = $em->getRepository('AppBundle:Team')->findAll();

        return $this->render('AppBundle:team:index.html.twig', array(
            'teams' => $teams,
        ));
    }

    /**
     * Creates a new Team entity.
     *
     */
    public function newAction(Request $request)
    {
		$userId = $request->attributes->get('user');
		$gameId = $request->attributes->get('game');
		
        $team = new Team();
		
		 $user = $this->getDoctrine()
        ->getRepository('AppBundle:User')
        ->find($userId);
		
		 $game = $this->getDoctrine()
        ->getRepository('AppBundle:Game')
        ->find($gameId);
		
		$team->setGame($game);
		
        $form = $this->createForm('AppBundle\Form\TeamType', $team);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
			
	        $query = $em->createQuery(
			    'SELECT p
			    FROM AppBundle:Player p
			    where p.game='.$gameId.
			    ' and p.user='.$userId
			);
			$players = $query->getResult();
			
			$players[0]->setTeam($team);
			$players[0]->setCapitain(true);
			
	        $query = $em->createQuery(
			    'SELECT p
			    FROM AppBundle:Application p
			    inner join AppBundle:Team t
			    with p.team=t.id
			    where p.user='.$userId.
			    ' and t.game='.$players[0]->getGame()->getId()
			);
			$applications = $query->getResult();
			
			foreach ($applications as $application) {
				$em->remove($application);
			}
			
            $em->persist($team);
            $em->persist($players[0]);
            $em->flush();

            return $this->redirectToRoute('team_show', array('id' => $team->getId()));
        }

        return $this->render('AppBundle:team:new.html.twig', array(
            'team' => $team,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Team entity.
     *
     */
    public function showAction(Team $team)
    {
        return $this->render('AppBundle:team:show.html.twig', array(
            'team' => $team
        ));
    }

    /**
     * Displays a form to edit an existing Team entity.
     *
     */
    public function editAction(Request $request, Team $team)
    {
        $editForm = $this->createForm('AppBundle\Form\TeamType', $team);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($team);
            $em->flush();

            
	        return $this->forward('AppBundle:Team:show', array(
			        'id'  => $team->getId()
			));
        }

		return $this->render('AppBundle:team:edit.html.twig', array(
            'team' => $team,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a Team entity.
     *
     */
    public function deleteAction(Request $request, Team $team)
    {
        $em = $this->getDoctrine()->getManager();
		
		$gameId= $team->getGame()->getId();
		
        $query = $em->createQuery(
		    'SELECT u
		    FROM AppBundle:Application u
		    where u.team='.$team->getId()
		);
		$applications = $query->getResult();
		
		foreach($applications as $application)
		{
			$em->remove($application);
		}
		
        $query = $em->createQuery(
		    'SELECT u
		    FROM AppBundle:Player u
		    where u.team='.$team->getId()
		);
		$players = $query->getResult();
		
		foreach($players as $player)
		{
			$player->setTeam(null);
			if($player->getCapitain())
			{
				$player->setCapitain(null);
			}
			$em->persist($player);
		}
		
        $em->remove($team);
        $em->flush();

        return $this->forward('AppBundle:Game:show', array(
		        'id'  => $gameId
		));
    }
	
    public function recruitAction($gameId)
    {
        $em = $this->getDoctrine()->getManager();
        $game = $em->getRepository('AppBundle:Game')->find($gameId);
		
        $query = $em->createQuery(
		    'SELECT u
		    FROM AppBundle:Team u
		    where u.game='.$gameId.
		    ' and u.validation is null'
		);
		$users = $query->getResult();
		
        $query = $em->createQuery(
		    'SELECT u
		    FROM AppBundle:Team u
		    where u.game='.$gameId.
		    ' and u.validation is not null'
		);
		$validTeams = $query->getResult();
		
        return $this->render('AppBundle:Team:search.html.twig', array(
            'teams' => $users,
            'validTeams' => $validTeams,
            'game'  =>$game
        ));
    }
}
