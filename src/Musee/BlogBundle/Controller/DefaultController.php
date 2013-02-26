<?php

namespace Musee\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MuseeBlogBundle:Default:index.html.twig', array('name' => $name));
    }
}
