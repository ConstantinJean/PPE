<?php

namespace Musee\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Musee\BlogBundle\Entity\Article;
use Musee\BlogBundle\Form\ArticleType;
use Musee\BlogBundle\Form\CommentaireType;
use Musee\BlogBundle\Entity\Commentaire;

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
		$article = $this -> getDoctrine()
						 -> getManager()
						 -> getRepository('MuseeBlogBundle:Article')
						 -> findOneBy(array('slug' => $slug));
		
		
		$article -> setContenu(html_entity_decode($article-> getContenu()) ); 
		
		
		$commentaire = new Commentaire();
		
		// On crée le FormBuilder grâce à la méthode du contrôleur
		$form = $this->createForm(new CommentaireType, $commentaire);
		
		$request = $this -> get('request');
		if($request->getMethod() == 'POST')
		{
			$form->bind($request);
			
			if($form->isValid()) //verification du formulaire
			{
				// On lie les commentaires à l'article
				$commentaire->setArticle($article);
				
				$em = $this->getDoctrine()->getManager();
				$em->persist($commentaire);
				$em->flush();
				
				return $this->redirect($this->generateUrl('musee_blog_afficher', array('slug' => $article -> getSlug())));
			}
		}
		
		// Array pour les commentaires
		$repository = $this->getDoctrine()
                   ->getManager()
                   ->getRepository('MuseeBlogBundle:Commentaire');
 
		$listecomms = $repository->findBy(array('Date' => 'desc'));
		
		
		$comm -> setContenu(html_entity_decode($listecomms-> getContenu()) );
		
		return $this -> render('MuseeBlogBundle:Article:afficher.html.twig', array('article' => $article, 'form' => $form->createView(), 'commentaire' => $comm));
	}
}