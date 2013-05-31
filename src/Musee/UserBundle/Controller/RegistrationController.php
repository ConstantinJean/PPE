<?php

namespace Musee\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Musee\UserBundle\Entity\User;
use Musee\UserBundle\Form\UserType;

class RegistrationController extends controller
{
    public function registerAction()
	{
		$user = new User;
		$form = $this->createForm(new UserType, $user);
		
		$request = $this -> get('request');
		if($request->getMethod() == 'POST')
		{
			$form->bind($request);
			
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
