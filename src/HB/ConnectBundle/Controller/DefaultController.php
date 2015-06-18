<?php

namespace HB\ConnectBundle\Controller;

use HB\ConnectBundle\Entity\User;
use HB\ConnectBundle\Entity\Friend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HBConnectBundle:Default:index.html.twig');
    }
}