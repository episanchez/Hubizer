<?php

namespace HB\NewsFeedBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewsController extends Controller
{
    public function indexAction()
    {
    	$user = $this->getUser();
    	$newsfriends = $this->getDoctrine()->getManager()->getRepository('HBNewsFeedBundle:News')->findNewsFriendByUser($user);
    	
        return $this->render('HBNewsFeedBundle:Default:index.html.twig', array('newsfriends' => $newsfriends));
    }
}
