<?php

namespace Musee\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Musee\UserBundle\Entity\User;
use Musee\UserBundle\Form\UserType;
use Musee\UserBundle\Entity\Chercheur;
use Musee\UserBundle\Form\ChercheurType;
use Musee\UserBundle\Entity\Adherent;
use Musee\UserBundle\Form\AdherentType;
use Musee\UserBundle\UserBundleEvents;
use Musee\UserBundle\Event\FormEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RegistrationController extends controller
{
    public function registerAdminAction()
	{
		$dispatcher = $this->get('event_dispatcher');
 
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
				$event = new FormEvent($form, $request);
				$dispatcher->dispatch(UserBundleEvents::onRegistrationSuccess, $event);
				
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
		$dispatcher = $this->get('event_dispatcher');
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
				$event = new FormEvent($form, $request);
				$dispatcher->dispatch(UserBundleEvents::onRegistrationSuccess, $event);
				
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
		$dispatcher = $this->get('event_dispatcher');
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
				$event = new FormEvent($form, $request);
				$dispatcher->dispatch(UserBundleEvents::onRegistrationSuccess, $event);
			
				$em = $this->getDoctrine()->getManager();
				$em->persist($user);
				$em->flush();
				
				return $this->redirect($this->generateUrl('musee_accueil'));
			}
		}
		
		return $this->render('MuseeUserBundle:User:registration.html.twig', array(
		'form' => $form->createView(),));
	}
	
	public function confirmAction($token)
	{
		$user;
		
		//test pour user
		if(null !== $this->getDoctrine()
                   ->getManager()
                   ->getRepository('MuseeUserBundle:User')
				   ->findOneByConfirmationToken($token))
		{
			$user = $this->getDoctrine()
                   ->getManager()
                   ->getRepository('MuseeUserBundle:User')
				   ->findOneByConfirmationToken($token);
		}
		
		//test pour adherent
		elseif(null !== $this->getDoctrine()
                   ->getManager()
                   ->getRepository('MuseeUserBundle:Adherent')
				   ->findOneByConfirmationToken($token))
		{
			$user = $this->getDoctrine()
                   ->getManager()
                   ->getRepository('MuseeUserBundle:Adherent')
				   ->findOneByConfirmationToken($token);
		}
		
		//test pour chercheur
		elseif(null !== $this->getDoctrine()
                   ->getManager()
                   ->getRepository('MuseeUserBundle:Chercheur')
				   ->findOneByConfirmationToken($token))
		{
			$user = $this->getDoctrine()
                   ->getManager()
                   ->getRepository('MuseeUserBundle:Chercheur')
				   ->findOneByConfirmationToken($token);
		}
		
		else
		{
			throw new NotFoundHttpException(sprintf('The user with confirmation token "%s" does not exist', $token));
		}
		
		$user->setConfirmationToken(null);
        $user->setIsActive(true);
		
		$em = $this->getDoctrine()-> getManager();
		$em -> flush();
		
		$this->get('session')->getFlashBag()->add('notice', 'Votre inscription est terminée. Veuillez vous connecter.');
		
		return $this->redirect($this->generateUrl('login'));
		
		
	}
}
