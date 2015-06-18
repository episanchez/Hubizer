<?php

namespace HB\NewsFeedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;
use HB\ConnectBundle\Entity\User;

/**
 * NewsManager
 * 
 */

class NewsRepository extends EntityRepository
{

    /**
     * Finds News by email
     *
     * @param User $user
     *
     * @return Array
     */
    public function findNewsByUser($user)
    {
        return $user->getNews();
    }

     /**
     * Finds a Ordered News Friends List by User
     *
     * @param User $user
     *
     * @return Array
     */
    public function findNewsFriendByUser($user)
    {
        $qb = $this->_em->createQuery('SELECT news FROM HBNewsFeedBundle:News news LEFT JOIN news.user user LEFT JOIN user.friends friend WHERE friend.user = :fr OR friend.userFriend = :fr');
        $qb->setParameter('fr', $user->getId());
        return $qb->getResult();
    }
}
