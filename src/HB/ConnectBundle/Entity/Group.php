<?php
// src/Acme/UserBundle/Entity/Group.php

namespace HB\ConnectBundle\Entity;

use FOS\UserBundle\Model\Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="hb_group")
 * @ORM\HasLifecycleCallbacks()
 */
class Group extends BaseGroup
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
     * @ORM\Column(name="country", type="string", length=255)
     */
    protected $country;
   
    /**
     * @ORM\Column(name="`describe`", type="text")
     */
    protected $describe;

    /**
     * @ORM\Column(name="`domain`", type="string", length=255)
     */
    protected $domain;

    /**
      * @ORM\OneToMany(targetEntity="GroupMember", mappedBy="group")
      */
    protected $members;

    public function __construct($name, $roles=array())
    {
        parent::__construct($name, $roles);
        // your own logic
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
     * Add members
     *
     * @param \HB\ConnectBundle\Entity\GroupMember $members
     * @return Group
     */
    public function addMember(\HB\ConnectBundle\Entity\GroupMember $members)
    {
        $this->members[] = $members;

        return $this;
    }

    /**
     * Remove members
     *
     * @param \HB\ConnectBundle\Entity\GroupMember $members
     */
    public function removeMember(\HB\ConnectBundle\Entity\GroupMember $members)
    {
        $this->members->removeElement($members);
    }

    /**
     * Get members
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @ORM\PostPersist
     */
    public function onPostPersist()
    {
        echo "coucou Event it's ok!";
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Group
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
     * @return Group
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
     * Set describe
     *
     * @param string $describe
     * @return Group
     */
    public function setDescribe($describe)
    {
        $this->describe = $describe;

        return $this;
    }

    /**
     * Get describe
     *
     * @return string 
     */
    public function getDescribe()
    {
        return $this->describe;
    }

    /**
     * Set domain
     *
     * @param string $domain
     * @return Group
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string 
     */
    public function getDomain()
    {
        return $this->domain;
    }
}
