<?php

namespace HB\NewsFeedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use HB\ConnectBundle\Entity\User;

/**
 * News
 *
 * @ORM\Table(name="nf_news")
 * @ORM\Entity(repositoryClass="HB\NewsFeedBundle\Entity\NewsRepository")
 */
class News
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    protected $type;

    /**
     * @ORM\Column(name="text", type="text")
     *
     */
    protected $text;
    
    /**
     *
     * @ORM\Column(name="date", type="date")
     */
    protected $date;

    /**
     * @ORM\ManyToOne(targetEntity="HB\ConnectBundle\Entity\User", inversedBy="news")
     */
    protected $user;

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
     * @return News
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
     * Set type
     *
     * @param string $type
     * @return News
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return News
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return News
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
}
