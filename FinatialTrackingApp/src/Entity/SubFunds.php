<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubFundsRepository")
 */
class SubFunds
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\users", inversedBy="subFunds")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Funds", inversedBy="subFunds")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_funds;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?users
    {
        return $this->id_user;
    }

    public function setIdUser(?users $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIdFunds(): ?Funds
    {
        return $this->id_funds;
    }

    public function setIdFunds(?Funds $id_funds): self
    {
        $this->id_funds = $id_funds;

        return $this;
    }
}
