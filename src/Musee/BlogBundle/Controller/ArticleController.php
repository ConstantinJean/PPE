<?php

namespace Musee\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Musee\BlogBundle\Entity\Article;
use Musee\BlogBundle\Form\ArticleType;

class ArticleController extends Controller
{
	public function ajouterArticleAction()
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
				
				return $this->redirect($this->generateUrl('musee_blog_afficher_liste', array('page' => 1)));
			}
		}
		
		return $this->render('MuseeBlogBundle:Article:ajouter.html.twig', array(
		'form' => $form->createView(),));
	}
	
	public function afficherListeArticleAction($page)
	{
		$articles = $this -> getDoctrine()
						 -> getManager()
						 -> getRepository('MuseeBlogBundle:Article')
						 -> getArticle(6, $page);
			
		foreach ($articles as $article)
		{
		$article -> setContenu(html_entity_decode($article-> getContenu()) ); 
		}
		return $this -> render('MuseeBlogBundle:Article:afficherListe.html.twig', array(
		'articles' => $articles,
		'page' => $page,
		'nombrePage' => ceil((count($articles)) / 6)
		));
	}
	
	public function modifierArticleAction(Article $article)
	{
		$article -> setContenu(html_entity_decode($article-> getContenu()) ); 
		$form = $this -> createForm(new ArticleType, $article);
		
		$request = $this -> get('request');
		if($request -> getMethod() == 'POST')
		{
			$form -> bind($request);
			
			if($form -> isValid())
			{
				$em = $this -> getDoctrine() -> getManager();
				$em -> persist($article);
				$em -> flush();
				
				return $this->redirect($this->generateUrl('musee_blog_afficher_liste', array('page' => 1)));
			}
		}
		
		return $this -> render('MuseeBlogBundle:Article:modifier.html.twig', array(
			'form' => $form -> createView(),
			));
	}
	
	public function supprimerArticleAction(Article $article)
	{
		$form = $this -> createFormBuilder() -> getForm();
		
		$request = $this -> get('request');
		if($request -> getMethod() == 'POST')
		{
			$form -> bind($request);
			
			if($form -> isValid())
			{
				$em = $this -> getDoctrine() -> getManager();
				$em -> remove($article);
				$em -> flush();
				
				return $this -> redirect($this -> generateUrl('musee_blog_afficher_liste', array('page' => 1)));
			}
		}
		
		return $this -> render('MuseeBlogBundle:Article:supprimer.html.twig', array(
		'form' => $form -> createView(),
		'article' => $article));
	}
	
	public function afficherArticleAction($slug)
	{
		$articles = $this -> getDoctrine()
						 -> getManager()
						 -> getRepository('MuseeBlogBundle:Article')
						 -> findBySlug($slug);
		
		foreach ($articles as $article)
		{
		$article -> setContenu(html_entity_decode($article-> getContenu()) ); 
		}
		
		return $this -> render('MuseeBlogBundle:Article:afficher.html.twig', array('articles' => $articles));
		
	}
	
}