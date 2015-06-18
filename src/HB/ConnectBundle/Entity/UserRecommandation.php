<?php

namespace HB\ConnectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserRecommandation
 *
 * @ORM\Table(name="hb_user_recommandation")
 * @ORM\Entity
 */
class UserRecommandation
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="recommandations")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Recommandation", mappedBy="UserRecommandation")
     */
    private $recommandations;

    /**
     * @ORM\OneToOne(targetEntity="TypeRecommandation")
     */
    private $type_recommandation;

    /**
     * @var integer
     *
     * @ORM\Column(name="reputation", type="integer")
     */
    private $reputation;


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
     * Set reputation
     *
     * @param integer $reputation
     * @return UserRecommandation
     */
    public function setReputation($reputation)
    {
        $this->reputation = $reputation;

        return $this;
    }

    /**
     * Get reputation
     *
     * @return integer 
     */
    public function getReputation()
    {
        return $this->reputation;
    }

    /**
     * Set user
     *
     * @param \HB\ConnectBundle\Entity\User $user
     * @return UserRecommandation
     */
    public function setUser(\HB\ConnectBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \HB\ConnectBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set recommandations
     *
     * @param \HB\ConnectBundle\Entity\Recommandation $recommandations
     * @return UserRecommandation
     */
    public function setRecommandations(\HB\ConnectBundle\Entity\Recommandation $recommandations = null)
    {
        $this->recommandations = $recommandations;

        return $this;
    }

    /**
     * Get recommandations
     *
     * @return \Doctrine\Common\Collections\Collection      */
    public function getRecommandations()
    {
        return $this->recommandations;
    }

    /**
     * Set type_recommandation
     *
     * @param \HB\ConnectBundle\Entity\TypeRecommandation $typeRecommandation
     * @return UserRecommandation
     */
    public function setTypeRecommandation(\HB\ConnectBundle\Entity\TypeRecommandation $typeRecommandation = null)
    {
        $this->type_recommandation = $typeRecommandation;

        return $this;
    }

    /**
     * Get type_recommandation
     *
     * @return \HB\ConnectBundle\Entity\TypeRecommandation 
     */
    public function getTypeRecommandation()
    {
        return $this->type_recommandation;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->recommandations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add recommandations
     *
     * @param \HB\ConnectBundle\Entity\Recommandation $recommandations
     * @return UserRecommandation
     */
    public function addRecommandation(\HB\ConnectBundle\Entity\Recommandation $recommandations)
    {
        $this->recommandations[] = $recommandations;

        return $this;
    }

    /**
     * Remove recommandations
     *
     * @param \HB\ConnectBundle\Entity\Recommandation $recommandations
     */
    public function removeRecommandation(\HB\ConnectBundle\Entity\Recommandation $recommandations)
    {
        $this->recommandations->removeElement($recommandations);
    }
}
