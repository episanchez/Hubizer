<?php
// src/Acme/UserBundle/Entity/User.php

namespace HB\ConnectBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use FOS\MessageBundle\Model\ParticipantInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use HB\NewsFeedBundle\Entity\News;

/**
 * @ORM\Entity
 * @ORM\Table(name="hb_user")
 */
class User extends BaseUser implements ParticipantInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

     /**
      * @ORM\Column(name="city", type="string", length=255)
      */
    protected $city;
    
     /**
      * @ORM\Column(name="gl_reputation", type="integer")
      */
     protected $gl_reputation;

     /**
      * @ORM\Column(name="country", type="string", length=255)
      */
    protected $country;

     /**
      * @ORM\Column(name="creation_date", type="date")
      */
    protected $creation_date;

    /**
      * @ORM\OneToMany(targetEntity="GroupMember", mappedBy="member")
      */
    protected $mgroups;
    
    /**
     * @ORM\OneToMany(targetEntity="Friend", mappedBy="user")
     */
    protected $friends;

    /**
     * @ORM\OneToMany(targetEntity="Friend", mappedBy="userFriend")
     */
    protected $friendOf;

     /**
      * @ORM\Column(name="birth_date", type="date")
      */
    protected $birth_date;

    /**
     * @ORM\OneToMany(targetEntity="HB\NewsFeedBundle\Entity\News", mappedBy="user")
     * 
     */
    protected $news;

    /**
     * @ORM\OneToMany(targetEntity="HB\ConnectBundle\Entity\UserRecommandation", mappedBy="user")
     */
    protected $recommandations;

    public function __construct()
    {
        parent::__construct();
        $this->creation_date = new \Datetime();
        $this->birth_date = new \Datetime();
        $this->friends = new ArrayCollection();
        $this->friendOf = new ArrayCollection();
        $this->gl_reputation = 0;
    }

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
     * @return User
     */
    public function setReputation($reputation)
    {
        $this->gl_reputation = $reputation;

        return $this;
    }

    /**
     * Get Reputation
     *
     * @return integer 
     */
    public function getReputation()
    {
        return $this->gl_reputation;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set creation_date
     *
     * @param \DateTime $creationDate
     * @return User
     */
    public function setCreationDate($creationDate)
    {
        $this->creation_date = $creationDate;

        return $this;
    }

    /**
     * Get creation_date
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creation_date;
    }

    /**
     * Set birth_date
     *
     * @param \DateTime $birthDate
     * @return User
     */
    public function setBirthDate($birthDate)
    {
        $this->birth_date = $birthDate;

        return $this;
    }

    /**
     * Get birth_date
     *
     * @return \DateTime 
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * Set gl_reputation
     *
     * @param integer $glReputation
     * @return User
     */
    public function setGlReputation($glReputation)
    {
        $this->gl_reputation = $glReputation;

        return $this;
    }

    /**
     * Get gl_reputation
     *
     * @return integer 
     */
    public function getGlReputation()
    {
        return $this->gl_reputation;
    }

    /**
     * Add friends
     *
     * @param \HB\ConnectBundle\Entity\Friend $friends
     * @return User
     */
    public function addFriend(\HB\ConnectBundle\Entity\Friend $friends)
    {
        $this->friends[] = $friends;

        return $this;
    }

    /**
     * Remove friends
     *
     * @param \HB\ConnectBundle\Entity\Friend $friends
     */
    public function removeFriend(\HB\ConnectBundle\Entity\Friend $friends)
    {
        $this->friends->removeElement($friends);
    }

    /**
     * Get friends
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFriends()
    {
        return new ArrayCollection(array_merge($this->friends->toArray(), $this->friendOf->toArray()));
    }

    /**
     * Add groups
     *
     * @param \HB\ConnectBundle\Entity\GroupMember $groups
     * @return User
     */
    public function addMGroup(\HB\ConnectBundle\Entity\GroupMember $groups)
    {
        $this->groups[] = $groups;

        return $this;
    }

    /**
     * Remove groups
     *
     * @param \HB\ConnectBundle\Entity\GroupMember $groups
     */
    public function removeMGroup(\HB\ConnectBundle\Entity\GroupMember $groups)
    {
        $this->groups->removeElement($groups);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMGroups()
    {
        return $this->groups;
    }

    /**
     * Add friendOf
     *
     * @param \HB\ConnectBundle\Entity\Friend $friendOf
     * @return User
     */
    public function addFriendOf(\HB\ConnectBundle\Entity\Friend $friendOf)
    {
        $this->friendOf[] = $friendOf;

        return $this;
    }

    /**
     * Remove friendOf
     *
     * @param \HB\ConnectBundle\Entity\Friend $friendOf
     */
    public function removeFriendOf(\HB\ConnectBundle\Entity\Friend $friendOf)
    {
        $this->friendOf->removeElement($friendOf);
    }

    /**
     * Get friendOf
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFriendOf()
    {
        return $this->friendOf;
    }

    /**
     * Add news
     *
     * @param \HB\NewsFeedBundle\Entity\News $news
     * @return User
     */
    public function addNews(\HB\NewsFeedBundle\Entity\News $news)
    {
        $this->news[] = $news;

        return $this;
    }

    /**
     * Remove news
     *
     * @param \HB\NewsFeedBundle\Entity\News $news
     */
    public function removeNews(\HB\NewsFeedBundle\Entity\News $news)
    {
        $this->news->removeElement($news);
    }

    /**
     * Get news
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNews()
    {
        return $this->news;
    }
}
