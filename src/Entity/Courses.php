<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Courses
 *
 * @ORM\Table(name="courses", indexes={@ORM\Index(name="Userid", columns={"Userid"})})
 * @ORM\Entity
 */
class Courses
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_C", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idC;

    /**
     * @var string
     *
     * @ORM\Column(name="nameC", type="string", length=30, nullable=false)
     */
    private $namec;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionC", type="string", length=255, nullable=false)
     */
    private $descriptionc;

    /**
     * @var float
     *
     * @ORM\Column(name="priceC", type="float", precision=10, scale=0, nullable=false)
     */
    private $pricec;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=30, nullable=false)
     */
    private $type;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numberW", type="integer", nullable=true)
     */
    private $numberw;

    /**
     * @var string
     *
     * @ORM\Column(name="image_path", type="string", length=255, nullable=false)
     */
    private $imagePath;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Userid", referencedColumnName="user_id")
     * })
     */
    private $userid;

    public function getIdC(): ?int
    {
        return $this->idC;
    }

    public function getNamec(): ?string
    {
        return $this->namec;
    }

    public function setNamec(string $namec): static
    {
        $this->namec = $namec;

        return $this;
    }

    public function getDescriptionc(): ?string
    {
        return $this->descriptionc;
    }

    public function setDescriptionc(string $descriptionc): static
    {
        $this->descriptionc = $descriptionc;

        return $this;
    }

    public function getPricec(): ?float
    {
        return $this->pricec;
    }

    public function setPricec(float $pricec): static
    {
        $this->pricec = $pricec;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getNumberw(): ?int
    {
        return $this->numberw;
    }

    public function setNumberw(?int $numberw): static
    {
        $this->numberw = $numberw;

        return $this;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(string $imagePath): static
    {
        $this->imagePath = $imagePath;

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
