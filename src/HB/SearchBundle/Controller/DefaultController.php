<?php

namespace HB\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HBSearchBundle:Default:index.html.twig', array('name' => $name));
    }
}
