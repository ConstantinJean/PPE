<?php

namespace Musee\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Musee\UserBundle\Entity\User;
use Musee\UserBundle\Form\UserType;
use Musee\UserBundle\Form\ChercheurType;
use Musee\UserBundle\Form\AdherentType;


class ModifController extends controller
{
    public function modifListeAction($page)
	{
		$users = $this	->getDoctrine()
						->getManager()
						->getRepository('MuseeUserBundle:User')
						->getUsers(25, $page);
						
		return $this -> render('MuseeUserBundle:User:modifListeUser.html.twig', array(
		'users' => $users,
		'page' => $page,
		'nombrePage' => ceil((count($users)) / 25)
		));
	}
	
	public function modifierAction(User $user)
	{
		$user = $this	->getDoctrine()
						->getManager()
						->getRepository('MuseeUserBundle:User')
						->findOneById($user);
		$form;
		
		if(in_array('ROLE_ADMIN',$user->getRoles()))
		{
			$form = $this->createForm(new UserType, $user);
			
		}
		
		elseif(in_array('ROLE_ADHERENT',$user->getRoles()))
		{
			$form = $this->createForm(new AdherentType, $user);
			
		}
		
		elseif(in_array('ROLE_CHERCHEUR',$user->getRoles()))
		{
			$form = $this->createForm(new ChercheurType, $user);
			
		}
		
		$request = $this -> get('request');
		if($request->getMethod() == 'POST')
		{
			
			
			$form->bind($request);
			
			
			
			if($form->isValid()) //verification du formulaire
			{
				
				
				$em = $this->getDoctrine()->getManager();
				$em->flush();
				
				return $this->redirect($this->generateUrl('musee_accueil'));
			}
		}
		
		return $this->render('MuseeUserBundle:User:modifUser.html.twig', array('form'=>$form->createView()));
		
		
		
	}
	
	public function supprListeAction($page)
	{
		$users = $this	->getDoctrine()
						->getManager()
						->getRepository('MuseeUserBundle:User')
						->getUsers(25, $page);
						
		return $this -> render('MuseeUserBundle:User:supprListeUser.html.twig', array(
		'users' => $users,
		'page' => $page,
		'nombrePage' => ceil((count($users)) / 25)
		));
	}
	
	public function supprimerAction(User $user)
	{
		$user = $this	->getDoctrine()
						->getManager()
						->getRepository('MuseeUserBundle:User')
						->findOneById($user);

		
				
		$em = $this->getDoctrine()->getManager();
		$em->remove($user);
		$em->flush();
		
		return $this->redirect($this->generateUrl('musee_accueil'));
			
	}
	
	public function supprConfirmAction($id)
	{
		return $this->render("MuseeUserBundle:User:supprConfirm.html.twig", array(
		'id' => $id));
	}
	
}