<?php

namespace HB\ConnectBundle\Controller;

use HB\ConnectBundle\Entity\User;
use HB\ConnectBunde\Entity\TypeRecommandation;
use HB\ConnectBundle\Entity\UserRecommandation;
use HB\ConnectBundle\Entity\Recommandation;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RecommendationController extends Controller
{
    public function GiveRecommandation(UserRecommandation $recommandation)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface)
            throw new AccessDeniedException('This user does not have access to this section.');
        if (is_object($recommandation))
            throw new AccessDeniedException('This recommandation does not exist! Be careful !');
        $rec = new Recommandation();
        $rec->setUserRecommandation($recommandation);
        $rec->setRecommander($user);

        return $this->render('FOSUserBundle:Profile:show.html.twig', array(
            'user' => $target_obj));
    }
    public function AddRecommandation($recommandation)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        // regarder si le type de recommandation existe
        $fnd_rec = $em->getRepository('HBConnectBundle:TypeRecommandation')->findOneByName($recommandation);
        if (!$fnd_rec)
        {
            $fnd_rec = new TypeRecommandation();
            $fnd_rec->setCategory('all');
            $fnd_rec->setName($recommandation);
            $em->persist($fnd_rec);
        }
        // Ajouter la recommandation (A voir: Verification si celui-ci existe, pour éviter les doublons)
        $usr_rec = new UserRecommandation();
        $usr_rec->setTypeRecommandation($fnd_rec->getId());
        $usr_rec->setUser($usr);
        $em->persist($usr_rec);
        $em->flush();
        return $this->render('FOSUserBundle:Profile:show.html.twig', array(
            'user' => $target_obj));
    }

    public function RemoveRecommandation(UserRecommandation $recommandation)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($recommandation);
        $em->flush();
        return $this->render('FOSUserBundle:Profile:show.html.twig', array(
            'user' => $target_obj));
    }
}