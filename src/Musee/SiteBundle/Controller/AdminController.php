<?php

namespace Musee\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Musee\UserBundle\Entity\User;
use Musee\UserBundle\Form\Type\RegistrationFormType;

class AdminController extends Controller
{
	public function pageAdminAction()
	{
		
		$registration = $this -> container -> get('musee_user.registration.form.type');
		
		return $this -> render('MuseeUserBundle:Registration:register.html.twig');
	}

}