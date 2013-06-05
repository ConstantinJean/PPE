<?php

namespace Musee\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Musee\UserBundle\Entity\User;
use Musee\UserBundle\Form\UserType;
use Musee\UserBundle\Entity\Chercheur;
use Musee\UserBundle\Form\ChercheurType;
use Musee\UserBundle\Entity\Adherent;
use Musee\UserBundle\Form\AdherentType;

class RegistrationController extends controller
{
    public function registerAdminAction()
	{
		$user = new User;
		$form = $this->createForm(new UserType, $user);
		
		$request = $this -> get('request');
		if($request->getMethod() == 'POST')
		{
			
			
			$form->bind($request);
			
			$factory = $this->get('security.encoder_factory');
			$encoder = $factory -> getEncoder($user);
			$password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
			$user->setPassword($password);
			$user->setUsername($user->getUsername());
			
			
			if($form->isValid()) //verification du formulaire
			{
				$em = $this->getDoctrine()->getManager();
				$em->persist($user);
				$em->flush();
				
				return $this->redirect($this->generateUrl('musee_accueil'));
			}
		}
		
		return $this->render('MuseeUserBundle:User:registration.html.twig', array(
		'form' => $form->createView(),));
	}
	
	public function registerAdherentAction()
	{
		$user = new Adherent;
		$form = $this->createForm(new AdherentType, $user);
		
		$request = $this -> get('request');
		if($request->getMethod() == 'POST')
		{
			
			
			$form->bind($request);
			
			$factory = $this->get('security.encoder_factory');
			$encoder = $factory -> getEncoder($user);
			$password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
			$user->setPassword($password);
			$user->setUsername($user->getUsername());
			
			
			if($form->isValid()) //verification du formulaire
			{
				$em = $this->getDoctrine()->getManager();
				$em->persist($user);
				$em->flush();
				
				return $this->redirect($this->generateUrl('musee_accueil'));
			}
		}
		
		return $this->render('MuseeUserBundle:User:registration.html.twig', array(
		'form' => $form->createView(),));
	}
	
	
	public function registerChercheurAction()
	{
		$user = new Chercheur;
		$form = $this->createForm(new ChercheurType, $user);
		
		$request = $this -> get('request');
		if($request->getMethod() == 'POST')
		{
			
			
			$form->bind($request);
			
			$factory = $this->get('security.encoder_factory');
			$encoder = $factory -> getEncoder($user);
			$password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
			$user->setPassword($password);
			$user->setUsername($user->getUsername());
			
			
			if($form->isValid()) //verification du formulaire
			{
				$em = $this->getDoctrine()->getManager();
				$em->persist($user);
				$em->flush();
				
				return $this->redirect($this->generateUrl('musee_accueil'));
			}
		}
		
		return $this->render('MuseeUserBundle:User:registration.html.twig', array(
		'form' => $form->createView(),));
	}
}
