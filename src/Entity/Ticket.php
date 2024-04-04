<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket", indexes={@ORM\Index(name="idU", columns={"idU"}), @ORM\Index(name="idE", columns={"idE"})})
 * @ORM\Entity
 */
class Ticket
{
    /**
     * @var int
     *
     * @ORM\Column(name="idT", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idt;

    /**
     * @var string
     *
     * @ORM\Column(name="qrCodeT", type="string", length=255, nullable=false)
     */
    private $qrcodet;

    /**
     * @var \Event
     *
     * @ORM\ManyToOne(targetEntity="Event")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idE", referencedColumnName="idE")
     * })
     */
    private $ide;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idU", referencedColumnName="user_id")
     * })
     */
    private $idu;

    public function getIdt(): ?int
    {
        return $this->idt;
    }

    public function getQrcodet(): ?string
    {
        return $this->qrcodet;
    }

    public function setQrcodet(string $qrcodet): static
    {
        $this->qrcodet = $qrcodet;

        return $this;
    }

    public function getIde(): ?Event
    {
        return $this->ide;
    }

    public function setIde(?Event $ide): static
    {
        $this->ide = $ide;

        return $this;
    }

    public function getIdu(): ?Users
    {
        return $this->idu;
    }

    public function setIdu(?Users $idu): static
    {
        $this->idu = $idu;

        return $this;
    }


}
