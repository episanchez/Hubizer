<?php
// src/Acme/MessageBundle/Entity/ThreadMetadata.php

namespace HB\PrivateMessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\MessageBundle\Entity\ThreadMetadata as BaseThreadMetadata;

/**
 * @ORM\Entity
 * @ORM\Table(name="msg_thread_metadata")
 */
class ThreadMetadata extends BaseThreadMetadata
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
     *   inversedBy="metadata"
     * )
     * @var \FOS\MessageBundle\Model\ThreadInterface
     */
    protected $thread;

    /**
     * @ORM\ManyToOne(targetEntity="HB\ConnectBundle\Entity\User")
     * @var \FOS\MessageBundle\Model\ParticipantInterface
     */
    protected $participant;

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
     * @return ThreadMetadata
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
     * Set participant
     *
     * @param \FOS\MessageBundle\Model\ParticipantInterface $participant
     * @return ThreadMetadata
     */
    public function setParticipant(\FOS\MessageBundle\Model\ParticipantInterface $participant = null)
    {
        $this->participant = $participant;

        return $this;
    }

    /**
     * Get participant
     *
     * @return \HB\ConnectBundle\Entity\User 
     */
    public function getParticipant()
    {
        return $this->participant;
    }
}
