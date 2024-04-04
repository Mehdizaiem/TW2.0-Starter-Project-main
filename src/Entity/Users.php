<?php

namespace App\Entity;
use App\Repository\UsersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "user_id", type: "integer")]    
    private ?int $user_id;

    #[ORM\Column(length: 255)]
    private ?string $firstname;

    #[ORM\Column(length: 255)]
    private ?string $lastname;

    #[ORM\Column(length: 255)]
    private ?string $password;

    #[ORM\Column(length: 255)]
    private ?string $emailAddress;

    #[ORM\Column(length: 255)]
    private ?string $role;

    #[ORM\Column(length: 255)]
    private ?string $accountStatus;
   
    #[ORM\Column(name: "date_Created", type: "datetime", nullable: false, options: ["default" => "CURRENT_TIMESTAMP"])]
    private $dateCreated = 'CURRENT_TIMESTAMP';

    #[ORM\Column(name: "last_login", type: "datetime", nullable: true)]
    private ?\DateTimeInterface $lastLogin;

    public function getUserId(): ?string
    {
        return $this->user_id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    public function setEmailAddress(string $emailAddress): static
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getAccountStatus(): ?string
    {
        return $this->accountStatus;
    }

    public function setAccountStatus(string $accountStatus): static
    {
        $this->accountStatus = $accountStatus;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): static
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getLastLogin(): ?\DateTimeInterface
    {
        return $this->lastLogin;
    }

    public function setLastLogin(?\DateTimeInterface $lastLogin): static
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }
    public function __toString(): string
    {
        return sprintf(
            "User ID: %s, First Name: %s, Last Name: %s, Email: %s, Role: %s, Account Status: %s, Date Created: %s, Last Login: %s",
            $this->user_id ?? 'N/A',
            $this->firstname ?? 'N/A',
            $this->lastname ?? 'N/A',
            $this->emailAddress ?? 'N/A',
            $this->role ?? 'N/A',
            $this->accountStatus ?? 'N/A',
            $this->dateCreated instanceof \DateTimeInterface ? $this->dateCreated->format('Y-m-d H:i:s') : 'N/A',
            $this->lastLogin instanceof \DateTimeInterface ? $this->lastLogin->format('Y-m-d H:i:s') : 'N/A'
        );
    }
    
}
