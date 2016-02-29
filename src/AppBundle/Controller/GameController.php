<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Game;
use AppBundle\Form\GameType;
use AppBundle\Repository\GameRepository;

use AppBundle\Entity\Image;
use AppBundle\Services\InsertingFile;
use AppBundle\Services\CreateFolderFilespath;

/**
 * Game controller.
 *
 */
class GameController extends Controller
{
    /**
     * @param InsertingFile
     */
    private $insertingFile;

    public function setInsertingFile(InsertingFile $insertingFile)
    {
        $this->insertingFile = $insertingFile;
    }
	
    /**
     * Lists all Game entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $games = $em->getRepository('AppBundle:Game')->findAll();

        return $this->render('AppBundle:game:index.html.twig', array(
            'games' => $games,
        ));
    }

    /**
     * Creates a new Game entity.
     *
     */
    public function newAction(Request $request)
    {
        $game = new Game();
        $form = $this->createForm(new GameType(), $game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($game);
            $em->flush();

            return $this->redirectToRoute('game_show', array('id' => $game->getId()));
        }

        return $this->render('AppBundle:game:new.html.twig', array(
            'game' => $game,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Game entity.
     *
     */
    public function showAction(Game $game)
    {
        $em = $this->getDoctrine()->getManager();
		
    	$systName = $game->getSystName();
		$places = $game->getPlaces();
    	if($systName=='multi')
		{
	        $query = $em->createQuery(
			    'SELECT p
			    FROM AppBundle:Team p
			    where p.game = '.$game->getId().'
			     and p.validation is not null'
			);
			$placesTaken = $query->getResult();
			$countPlaces = $places-count($placesTaken);
			
			$leftPlaces = 'Nb places équipes restantes : '.$countPlaces;
		}
		elseif($systName=="solo" && $places)
		{
	        $query = $em->createQuery(
			    'SELECT p
			    FROM AppBundle:Player p
			    where p.game = '.$game->getId()
			);
			$placesTaken = $query->getResult();
			$countPlaces = $places-count($placesTaken);
			
			$leftPlaces='Nb places restantes : '.$countPlaces;
		}
		else 
		{
	        $query = $em->createQuery(
			    'SELECT p
			    FROM AppBundle:Player p
			    where p.game = '.$game->getId()
			);
			$interest = $query->getResult();
			$leftPlaces='Nb personnes intéressées : '.count($interest);
		}
		
        $query = $em->createQuery(
		    'SELECT p
		    FROM AppBundle:Player p
		    where p.game = '.$game->getId().'
		     and p.team is null'
		);
		$soloPlayers = $query->getResult();
		$randArray=array();
		$keys=array();
		$randArray=array();
		
		if(empty($soloPlayers))
		{
		}
		elseif(count($soloPlayers)<=4)
		{
			$randArray= $soloPlayers;
		}
		else {
			for($i=0;$i<5;$i++)
			{
				$key = rand(0,count($soloPlayers)-1);
				while(in_array($key, $keys))
				{
					$key = rand(0,count($soloPlayers)-1);
				}
				$keys[$i]=$key;
				$randArray[$i]=$soloPlayers[$key];
			}
		}
		
		
        return $this->render('AppBundle:game:show.html.twig', array(
            'game'       => $game,
            'leftPlaces' => $leftPlaces,
            'randArray'  => $randArray
        ));
    }

    /**
     * Displays a form to edit an existing Game entity.
     *
     */
    public function editAction(Request $request, Game $game)
    {
        $deleteForm = $this->createDeleteForm($game);
        $editForm = $this->createForm(new GameType(), $game);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
			
			//$this->container->get('inserting_file')->onNewImage($game);
			
            $em->persist($game);
            //$em->persist($game->getImage());
            $em->flush();

            return $this->redirectToRoute('game_edit', array('id' => $game->getId()));
        }

        return $this->render('AppBundle:game:edit.html.twig', array(
            'game' => $game,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Game entity.
     *
     */
    public function deleteAction(Request $request, Game $game)
    {
        $form = $this->createDeleteForm($game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($game);
            $em->flush();
        }

        return $this->redirectToRoute('game_index');
    }

    /**
     * Creates a form to delete a Game entity.
     *
     * @param Game $game The Game entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Game $game)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('game_delete', array('id' => $game->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * @param Game $game
     */
    public function preUpdate($game)
    {
        $this -> insertingFile -> onNewImage($game);
    }
	
    public function byCategoryAction($category)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
		    'SELECT p
		    FROM AppBundle:Game p
		    where p.category='.$category
		);
		$games = $query->getResult();

        return $this->render('AppBundle:game:index.html.twig', array(
            'games' => $games,
        ));
    }
}
