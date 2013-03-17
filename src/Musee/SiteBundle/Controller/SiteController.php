<?php

namespace Musee\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Musee\SiteBundle\Entity\Mail;
use Musee\SiteBundle\Form\MailType;

class SiteController extends Controller
{
    public function indexAction()
    {
        return $this->render('MuseeSiteBundle:Site:index.html.twig');
    }
	
	public function aProposAction()
	{
		return $this->render('MuseeSiteBundle:Site:aPropos.html.twig');
	}
	
	public function contactAction()
	{
		return $this->render('MuseeSiteBundle:Site:contact.html.twig');
	}
	
	public function infosPratiquesAction()
	{
		return $this->render('MuseeSiteBundle:Site:infosPratiques.html.twig');
	}
	
	public function mailAction($id)
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
					->setSubject($mail->subject)
					->setFrom($mail->email)				
					->setTo('queelev@gmail.com')
					->setBody($mail->body.'<br/>'.$mail->name);
					
				$this->get('mailer')->send($message);
  
				// Redirect - This is important to prevent users re-posting
				// the form if they refresh the page
				return $this->redirect($this->generateUrl('musee_contact'));
			}
		}

		return $this->render('MuseeSiteBundle:Site:mail.html.twig', array(
			'form' => $form->createView()
		));
    }
}
