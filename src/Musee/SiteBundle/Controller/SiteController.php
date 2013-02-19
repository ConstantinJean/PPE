<?php

namespace Musee\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SiteController extends Controller
{
    public function indexAction()
    {
        return $this->render('MuseeSiteBundle:Site:index.html.twig');
    }
}
