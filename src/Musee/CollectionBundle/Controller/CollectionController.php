<?php

namespace Musee\CollectionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Musee\CollectionBundle\Entity\Objet;
use Musee\CollectionBundle\Form\ObjetType;

class CollectionController extends Controller
{
	public function ajouterObjetAction()
	{
		$objet = new Objet;
		$form = $this->createForm(new ObjetType, $objet);
		
		$request = $this -> get('request');
		if($request->getMethod() == 'POST')
		{
			$form -> bind($request);
			
			if($form->isValid())
			{
				$em = $this -> getDoctrine() -> getManager();
				$em -> persist($objet);
				$em -> flush();
			
				return $this -> redirect($this->generateUrl('musee_accueil'));
			}
		}
		
		return $this -> render('MuseeCollectionBundle:Collection:ajouter.html.twig',
		array('form' => $form->createView(),));
	}
}
