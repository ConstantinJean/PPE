<?php

namespace Musee\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Musee\BlogBundle\Entity\Article;
use Musee\BlogBundle\Form\ArticleType;

class ArticleController extends Controller
{
	public function ajouterAction()
	{
		$article = new Article;
		$form = $this->createForm(new ArticleType, $article);
		
		$request = $this -> get('request');
		if($request->getMethod() == 'POST')
		{
			$form->bind($request);
			
			if($form->isValid()) //verification du formulaire
			{
				$em = $this->getDoctrine()->getManager();
				$em->persist($article);
				$em->flush();
				
				return $this->redirect($this->generateUrl('musee_accueil'));
			}
		}
		
		return $this->render('MuseeBlogBundle:Article:ajouter.html.twig', array(
		'form' => $form->createView(),));
	}
	
	public function afficherAction($id)
	{
		$article = new Article;
		
		$repository = $this ->getDoctrine() -> getManager() -> getRepository('MuseeBlogBundle:Article');
		
		$article = $repository -> find($id);
		
		

		

		
		return $this->render('MuseeBlogBundle:Article:afficher.html.twig', array(
		'article' => $article
		));
	}
}