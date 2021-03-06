<?php

namespace Musee\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Musee\SiteBundle\Entity\Mail;
use Musee\SiteBundle\Form\MailType;

class SiteController extends Controller
{
    public function indexAction()
    {
		$articles = $this -> getDoctrine()
						 -> getManager()
						 -> getRepository('MuseeBlogBundle:Article')
						 -> getArticle(1, 1);
						 
		foreach ($articles as $article)
		{
		$article -> setContenu(html_entity_decode($article-> getContenu()) ); 
		}				 
		
		$repository = $this -> getDoctrine()
						 -> getManager()
						 -> getRepository('MuseeCollectionBundle:Objet');
						 
		$objets = $repository->findBy(array('exposition' => '1'),
                                     array(),
                                     2,
                                     0);
						 
        return $this->render('MuseeSiteBundle:Site:index.html.twig', 
				array('articles' => $articles, 'objets' => $objets));
    }
	
	public function aProposAction()
	{
		return $this->render('MuseeSiteBundle:Site:aPropos.html.twig');
	}
	
	public function contactAction()
	{
		$mail = new Mail();
		$form = $this->createForm(new MailType(), $mail);

		$request = $this->getRequest();
		if ($request->getMethod() == 'POST') {
			$form->bindRequest($request);

			if ($form->isValid()) {
				// Perform some action, such as sending an email
				$mailer = $this->get('mailer');
				$message = \Swift_Message::newInstance()			
					->setSubject($mail->getSubject())
					->setFrom('kustomkadiak@gmail.com')				
					->setTo('constantin.jean2111@gmail.com')
					->setBody($mail->getBody().'<br/>'.$mail->getName().'<br/> <hr/>'.$mail->getEmail());
					
				$this->get('mailer')->send($message);
  
				// Redirect - This is important to prevent users re-posting
				// the form if they refresh the page
				return $this->redirect($this->generateUrl('musee_contact'));
			}
		}

		return $this->render('MuseeSiteBundle:Site:contact.html.twig', array(
			'form' => $form->createView()
		));
	}
	
	public function infosPratiquesAction()
	{
		return $this->render('MuseeSiteBundle:Site:infosPratiques.html.twig');
	}
	
	
	public function listeAction($page, $route)
	{
		$users = $this->getDoctrine()
                     ->getManager()
                     ->getRepository('MuseeUserBundle:User')
                     ->getUsers(20, $page); // 20 users par page
 
		// On ajoute ici les variables page et nb_page à la vue
		return $this->render('MuseeSiteBundle:Site:liste.html.twig', array(
		  'users'   => $users,
		  'page'       => $page,
		  'nombrePage' => ceil(count($users)/20),
		  'route' => $route
		));
		
	}
}
