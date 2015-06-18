<?php

namespace HB\ConnectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Friend
 *
 * @ORM\Table(name="hb_friend")
 * @ORM\Entity
 */
class Friend
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
      * @ORM\ManyToOne(targetEntity="User", inversedBy="friends")
      * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
      */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="friendOf")
     * @ORM\JoinColumn(name="friend_id", referencedColumnName="id")
     */
    private $userFriend;
    
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
     * Set user
     *
     * @param \HB\ConnectBundle\Entity\User $user
     * @return Friend
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
     * Set userFriend
     *
     * @param \HB\ConnectBundle\Entity\User $user
     * @return Friend
     */
    public function setUserFriend(\HB\ConnectBundle\Entity\User $user = null)
    {
        $this->userFriend = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \HB\ConnectBundle\Entity\User 
     */
    public function getUserFriend()
    {
        return $this->userFriend;
    }
}
