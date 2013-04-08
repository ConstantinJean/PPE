<?php

namespace Musee\CollectionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Musee\CollectionBundle\Entity\Objet;
use Musee\CollectionBundle\Form\ObjetType;

class CollectionController extends Controller
{
	public function afficherListeObjetAction($page)
	{
		$objets = $this -> getDoctrine()
						-> getManager()
						-> getRepository('MuseeCollectionBundle:Objet')
						-> getObjets(6, $page);
						
		return $this -> render('MuseeCollectionBundle:Collection:afficherListe.html.twig', array(
			'objets' => $objets,
			'page' => $page,
			'nombrePage' => ceil(count($objets)/6)
		));
	}
	
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
			
				return $this -> redirect($this->generateUrl('musee_collection_afficher_liste', array('page'=>1)));
			}
		}
		
		return $this -> render('MuseeCollectionBundle:Collection:ajouter.html.twig',
		array('form' => $form->createView(),));
	}
	
	public function modifierObjetAction(Objet $objet)
	{
		$form = $this -> createForm(new ObjetType(), $objet);
		
		$request = $this -> get('request');
		if($request -> getMethod() == 'POST')
		{
			$form -> bind($request);
			
			if($form -> isValid())
			{
				$em = $this -> getDoctrine() -> getManager();
				$em -> persist($objet);
				$em -> flush();
				
				return $this -> redirect($this -> generateUrl('musee_collection_afficher_liste', array('page'=>1)));
			}
		}
		
		return $this -> render('MuseeCollectionBundle:Collection:modifier.html.twig',
		array('form' => $form->createView(),
		'objet' => $objet));
	}
	
	public function supprimerObjetAction(Objet $objet)
    {
		// On crée un formulaire vide, qui ne contiendra que le champ CSRF
		// Cela permet de protéger la suppression d'article contre cette faille
		$form = $this->createFormBuilder()->getForm();

		$request = $this->getRequest();
		if ($request->getMethod() == 'POST') {
		  $form->bind($request);

		  if ($form->isValid()) {
			// On supprime l'article
			$em = $this->getDoctrine()->getManager();
			$em->remove($objet);
			$em->flush();

			// On définit un message flash
			//$this->get('session')->getFlashBag()->add('info', 'Article bien supprimé');

			// Puis on redirige vers l'accueil
			return $this->redirect($this->generateUrl('musee_collection_afficher_liste', array('page'=>1)));
		  }
		}

		// Si la requête est en GET, on affiche une page de confirmation avant de supprimer
		return $this->render('MuseeCollectionBundle:Collection:supprimer.html.twig', array(
		  'objet' => $objet,
		  'form'    => $form->createView()
		));
	}
	
	public function afficherObjetAction($id)
	{
		$objets = $this -> getDoctrine()
						 -> getManager()
						 -> getRepository('MuseeCollectionBundle:Objet');
		
		return $this -> render('MuseeCollectionBundle:Objet:afficher.html.twig', array('Objets' => $Objets));
	}
}
