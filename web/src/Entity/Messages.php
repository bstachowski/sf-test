<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MessagesRepository")
 */
class Messages
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $message_from;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $message_to;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $message_title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $message_content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $delivered_at;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessageFrom(): ?string
    {
        return $this->message_from;
    }

    public function setMessageFrom(string $message_from): self
    {
        $this->message_from = $message_from;

        return $this;
    }

    public function getMessageTo(): ?string
    {
        return $this->message_to;
    }

    public function setMessageTo(string $message_to): self
    {
        $this->message_to = $message_to;

        return $this;
    }

    public function getMessageTitle(): ?string
    {
        return $this->message_title;
    }

    public function setMessageTitle(string $message_title): self
    {
        $this->message_title = $message_title;

        return $this;
    }

    public function getMessageContent(): ?string
    {
        return $this->message_content;
    }

    public function setMessageContent(string $message_content): self
    {
        $this->message_content = $message_content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getDeliveredAt(): ?\DateTimeInterface
    {
        return $this->delivered_at;
    }

    public function setDeliveredAt(\DateTimeInterface $delivered_at): self
    {
        $this->delivered_at = $delivered_at;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }
}
