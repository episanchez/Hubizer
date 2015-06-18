<?php
// src/Acme/MessageBundle/Entity/MessageMetadata.php

namespace HB\PrivateMessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\MessageBundle\Entity\MessageMetadata as BaseMessageMetadata;

/**
 * @ORM\Entity
 * @ORM\Table(name="msg_message_metadata")
 */
class MessageMetadata extends BaseMessageMetadata
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(
     *   targetEntity="Message",
     *   inversedBy="metadata"
     * )
     * @var \FOS\MessageBundle\Model\MessageInterface
     */
    protected $message;

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
     * Set message
     *
     * @param \FOS\MessageBundle\Model\MessageInterface $message
     * @return MessageMetadata
     */
    public function setMessage(\FOS\MessageBundle\Model\MessageInterface $message = null)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return \HB\PrivateMessageBundle\Entity\Message 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set participant
     *
     * @param \FOS\MessageBundle\Model\ParticipantInterface $participant
     * @return MessageMetadata
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
