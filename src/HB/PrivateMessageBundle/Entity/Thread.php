<?php
// src/Acme/MessageBundle/Entity/Thread.php

namespace HB\PrivateMessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\MessageBundle\Entity\Thread as BaseThread;

/**
 * @ORM\Entity
 * @ORM\Table(name="msg_thread")
 */
class Thread extends BaseThread
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="HB\ConnectBundle\Entity\User")
     * @var \FOS\MessageBundle\Model\ParticipantInterface
     */
    protected $createdBy;

    /**
     * @ORM\OneToMany(
     *   targetEntity="Message",
     *   mappedBy="thread"
     * )
     * @var Message[]|\Doctrine\Common\Collections\Collection
     */
    protected $messages;

    /**
     * @ORM\OneToMany(
     *   targetEntity="ThreadMetadata",
     *   mappedBy="thread",
     *   cascade={"all"}
     * )
     * @var ThreadMetadata[]|\Doctrine\Common\Collections\Collection
     */
    protected $metadata;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set createdBy
     *
     * @param \FOS\MessageBundle\Model\ParticipantInterface $createdBy
     * @return Thread
     */
    public function setCreatedBy(\FOS\MessageBundle\Model\ParticipantInterface $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \FOS\MessageBundle\Model\ParticipantInterface 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Add messages
     *
     * @param \FOS\MessageBundle\Model\MessageInterface $messages
     * @return Thread
     */
    public function addMessage(\FOS\MessageBundle\Model\MessageInterface $messages)
    {
        $this->messages[] = $messages;

        return $this;
    }

    /**
     * Remove messages
     *
     * @param \FOS\MessageBundle\Model\MessageInterface$messages
     */
    public function removeMessage(\FOS\MessageBundle\Model\MessageInterface $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Add metadata
     *
     * @param \HB\PrivateMessageBundle\Entity\ThreadMetadata $metadata
     * @return Thread
     */
    public function addMetadatum(\HB\PrivateMessageBundle\Entity\ThreadMetadata $metadata)
    {
        $this->metadata[] = $metadata;

        return $this;
    }

    /**
     * Remove metadata
     *
     * @param \HB\PrivateMessageBundle\Entity\ThreadMetadata $metadata
     */
    public function removeMetadatum(\HB\PrivateMessageBundle\Entity\ThreadMetadata $metadata)
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
