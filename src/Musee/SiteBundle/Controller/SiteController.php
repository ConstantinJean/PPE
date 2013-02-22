<?php

namespace Musee\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
}
