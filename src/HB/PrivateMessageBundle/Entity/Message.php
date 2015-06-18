<?php

namespace HB\PrivateMessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\MessageBundle\Entity\Message as BaseMessage;

/**
 * @ORM\Entity
 * @ORM\Table(name="msg_message")
 */
class Message extends BaseMessage
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(
     *   targetEntity="Thread",
     *   inversedBy="messages"
     * )
     * @var \FOS\MessageBundle\Model\ThreadInterface
     */
    protected $thread;

    /**
     * @ORM\ManyToOne(targetEntity="HB\ConnectBundle\Entity\User")
     * @var \FOS\MessageBundle\Model\ParticipantInterface
     */
    protected $sender;

    /**
     * @ORM\OneToMany(
     *   targetEntity="MessageMetadata",
     *   mappedBy="message",
     *   cascade={"all"}
     * )
     * @var MessageMetadata[]|\Doctrine\Common\Collections\Collection
     */
    protected $metadata;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->metadata = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set thread
     *
     * @param \FOS\MessageBundle\Model\ThreadInterface $thread
     * @return Message
     */
    public function setThread(\FOS\MessageBundle\Model\ThreadInterface $thread = null)
    {
        $this->thread = $thread;

        return $this;
    }

    /**
     * Get thread
     *
     * @return \HB\PrivateMessageBundle\Entity\Thread
     */
    public function getThread()
    {
        return $this->thread;
    }

    /**
     * Set sender
     *
     * @param \FOS\MessageBundle\Model\ParticipantInterface $sender
     * @return Message
     */
    public function setSender(\FOS\MessageBundle\Model\ParticipantInterface $sender = null)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return \HB\ConnectBundle\Entity\User 
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Add metadata
     *
     * @param \HB\PrivateMessageBundle\Entity\MessageMetadata $metadata
     * @return Message
     */
    public function addMetadatum(\HB\PrivateMessageBundle\Entity\MessageMetadata $metadata)
    {
        $this->metadata[] = $metadata;

        return $this;
    }

    /**
     * Remove metadata
     *
     * @param \HB\PrivateMessageBundle\Entity\MessageMetadata $metadata
     */
    public function removeMetadatum(\HB\PrivateMessageBundle\Entity\MessageMetadata $metadata)
    {
        $this->metadata->removeElement($metadata);
    }

    /**
     * Get metadata
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMetadata()
    {
        return $this->metadata;
    }
}
