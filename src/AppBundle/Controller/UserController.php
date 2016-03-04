<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\RegistrationType;
use AppBundle\Repository\UserRepository;

use AppBundle\Entity\Interest;

/**
 * User controller.
 *
 */
class UserController extends Controller
{
    /**
     * Lists all User entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery(
		    'SELECT u
		    FROM AppBundle:User u
		    order by u.id desc'
		);
		$users = $query->getResult();
		
		$payed=array();
		$i=0;
		foreach($users as $user)
		{
			if($user->getPayed())
			{
				$payed[$i]=$user;
				$i++;
			}
		}

        return $this->render('AppBundle:user:index.html.twig', array(
            'users'     => $users,
            'userPayed' => $payed
        ));
    }

    /**
     * Creates a new User entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new UserType(), $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        return $this->render('AppBundle:user:new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a User entity.
     *
     */
    public function showAction(User $user)
    {
        return $this->render('AppBundle:user:show.html.twig', array(
            'user' => $user,
        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function editAction(Request $request, User $user)
    {
        $editForm = $this->createForm(new RegistrationType(), $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        return $this->render('AppBundle:user:edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction(Request $request, User $user)
    {
        $em = $this->getDoctrine()->getManager();
        
        $query = $em->createQuery(
		    'SELECT u
		    FROM AppBundle:Player u
		    where u.user='.$user->getId()
		);
		$players = $query->getResult();
		
		foreach($players as $player)
		{
			$em->remove($player);
		}
        
        $query = $em->createQuery(
		    'SELECT u
		    FROM AppBundle:Application u
		    where u.user='.$user->getId()
		);
		$applications = $query->getResult();
		
		foreach($applications as $application)
		{
			$em->remove($application);
		}
        
        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute('labelilan');
    }
	
    public function recruitAction($gameId)
    {
        $em = $this->getDoctrine()->getManager();
        $game = $em->getRepository('AppBundle:Game')->find($gameId);
		
        $query = $em->createQuery(
		    'SELECT p
		    FROM AppBundle:Player p
		    where p.game='.$gameId.
		    ' and p.team is null'
		);
		$players = $query->getResult();
		
        $query = $em->createQuery(
		    'SELECT p
		    FROM AppBundle:Player p
		    where p.game='.$gameId.
		    ' and p.team is not null'
		);
		$teamPlayers = $query->getResult();		
		
        return $this->render('AppBundle:user:search.html.twig', array(
        	'teamPlayers' => $teamPlayers,
            'players'     => $players,
            'game'        =>$game
        ));
    }
	
    public function validateAction($id,$status)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);
		if($status=='true')
		{
			$user->setPayed(true);
		}
		elseif($status=='false')
		{
			$user->setPayed(false);
		}
		$em->persist($user);
		$em->flush();
		
        return $this->forward('AppBundle:User:index');
    }

	public function payedUserAction($id)
	{
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);
	    $user->setPayed(1);
		$em->persist($user);
		$em->flush();
		
		return $this->redirectToRoute('user_index');
	}

	public function confirmationUserAction($id)
	{
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);
		$mailUser = $user->getEmail();
		
		$message = \Swift_Message::newInstance()
	        ->setSubject('Confirmation paiement LGC')
	        ->setFrom('lgc@labeli.org')
	        ->setTo($mailUser)
	        ->setBody(
	            $this->render(
	                '::email/confirmation.html.twig'
	            ),
	            'text/html'
	        )
	    ;
	    $this->get('mailer')->send($message);
	    
	    $user->setConfirmation(1);
		$em->persist($user);
		$em->flush();
		
		return $this->redirectToRoute('user_index');
	}

	public function mailPayedUserAction($id)
	{
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);
		
		$mailUser = $user->getEmail();
		
		$message = \Swift_Message::newInstance()
	        ->setSubject('Confirmation paiement LGC')
	        ->setFrom('lgc@labeli.org')
	        ->setTo($mailUser)
	        ->setBody(
	            $this->render(
	                '::email/mailPayed.html.twig'
	            ),
	            'text/html'
	        )
	    ;
	    $this->get('mailer')->send($message);
		
	    $user->setMailPayed(1);
		$em->persist($user);
		$em->flush();
		
		return $this->redirectToRoute('user_index');
	}
	
}
