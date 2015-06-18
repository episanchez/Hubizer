<?php

namespace HB\ConnectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recommandation
 *
 * @ORM\Table(name="hb_recommandation")
 * @ORM\Entity
 */
class Recommandation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="UserRecommandation", inversedBy="Recommandation")
     */
    private $userRecommandation;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $recommender;

    // Date recommendation && comment

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set recommender
     *
     * @param \HB\ConnectBundle\Entity\User $recommender
     * @return Recommandation
     */
    public function setRecommender(\HB\ConnectBundle\Entity\User $recommender = null)
    {
        $this->recommender = $recommender;

        return $this;
    }

    /**
     * Get recommender
     *
     * @return \HB\ConnectBundle\Entity\User 
     */
    public function getRecommender()
    {
        return $this->recommender;
    }

    /**
     * Set userRecommandation
     *
     * @param \HB\ConnectBundle\Entity\UserRecommandation $userRecommandation
     * @return Recommandation
     */
    public function setUserRecommandation(\HB\ConnectBundle\Entity\UserRecommandation $userRecommandation = null)
    {
        $this->userRecommandation = $userRecommandation;

        return $this;
    }

    /**
     * Get userRecommandation
     *
     * @return \HB\ConnectBundle\Entity\UserRecommandation 
     */
    public function getUserRecommandation()
    {
        return $this->userRecommandation;
    }
}
