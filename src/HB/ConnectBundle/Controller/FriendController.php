<?php

namespace HB\ConnectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HB\ConnectBundle\Entity\Friend;

class FriendController extends Controller
{
	public function addFriend($id_user)
	{
		$em = $this->getDoctrine()->getManager();
		$user = $this->getUser();
		$userfriend = $em->getRepository('HBConnectBundle:User')->find($id_user);
        if (!is_object($user) || !$user instanceof UserInterface)
            throw new AccessDeniedException('This user does not have access to this section.');
        if (!is_object($userfriend) || !$userfriend instanceof UserInterface)
            throw new AccessDeniedException('This user does not have access to this section.');
		$friend = new Friend;
		$friend->setUser($user);
		$friend->setUserFriend($userfriend);
		$em->persist($friend);
		$em->flush();
		return render();
	}
	public function removeFriend($id_user)
	{
		$friends = $this->getUser()->getFriends();
		$em = $this->getDoctrine()->getManager();
		foreach ($friends as $friend) {
			if ($friend->getUser()->getId() == $id_user || $friend->getUserFriend()->getId() == $id_user)
				$em->remove($friend);
				$em->persist($friend);
				$em->flush();
				break;
		}
		return render();
	}
}
