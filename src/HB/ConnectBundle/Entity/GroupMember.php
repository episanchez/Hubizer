<?php

namespace HB\ConnectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GroupMember
 *
 * @ORM\Table(name="hb_GroupMember")
 * @ORM\Entity
 */
class GroupMember
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
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(name="reputation", type="integer")
     */
    private $reputation;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="mgroups")
     * @ORM\JoinColumn(name="user_id")
     */
    private $member;

    /**
     * @ORM\ManyToOne(targetEntity="Group", inversedBy="members")
     * @ORM\JoinColumn(name="group_id")
     */
    private $group;

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
     * Set status
     *
     * @param string $status
     * @return GroupMember
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }


    /**
     * Set member
     *
     * @param \HB\ConnectBundle\Entity\User $member
     * @return GroupMember
     */
    public function setMember(\HB\ConnectBundle\Entity\User $member = null)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * Get member
     *
     * @return \HB\ConnectBundle\Entity\User 
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * Set group
     *
     * @param \HB\ConnectBundle\Entity\Group $group
     * @return GroupMember
     */
    public function setGroup(\HB\ConnectBundle\Entity\Group $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \HB\ConnectBundle\Entity\Group 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set reputation
     *
     * @param integer $reputation
     * @return GroupMember
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
}
