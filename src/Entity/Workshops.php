<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Workshops
 *
 * @ORM\Table(name="workshops", indexes={@ORM\Index(name="fkCoursesid", columns={"id_C"}), @ORM\Index(name="Userid", columns={"Userid"})})
 * @ORM\Entity
 */
class Workshops
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_W", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idW;

    /**
     * @var string
     *
     * @ORM\Column(name="nameW", type="string", length=255, nullable=false)
     */
    private $namew;

    /**
     * @var string
     *
     * @ORM\Column(name="resources", type="string", length=255, nullable=false)
     */
    private $resources;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="duration", type="float", precision=10, scale=0, nullable=false)
     */
    private $duration;

    /**
     * @var \Courses
     *
     * @ORM\ManyToOne(targetEntity="Courses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_C", referencedColumnName="id_C")
     * })
     */
    private $idC;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Userid", referencedColumnName="user_id")
     * })
     */
    private $userid;

    public function getIdW(): ?int
    {
        return $this->idW;
    }

    public function getNamew(): ?string
    {
        return $this->namew;
    }

    public function setNamew(string $namew): static
    {
        $this->namew = $namew;

        return $this;
    }

    public function getResources(): ?string
    {
        return $this->resources;
    }

    public function setResources(string $resources): static
    {
        $this->resources = $resources;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDuration(): ?float
    {
        return $this->duration;
    }

    public function setDuration(float $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getIdC(): ?Courses
    {
        return $this->idC;
    }

    public function setIdC(?Courses $idC): static
    {
        $this->idC = $idC;

        return $this;
    }

    public function getUserid(): ?Users
    {
        return $this->userid;
    }

    public function setUserid(?Users $userid): static
    {
        $this->userid = $userid;

        return $this;
    }


}
