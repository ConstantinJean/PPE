<?php

namespace Musee\CollectionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MuseeCollectionBundle:Default:index.html.twig', array('name' => $name));
    }
}
