<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MovementsRepository")
 */
class Movements
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Transactions", inversedBy="movements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_transaction;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Reason;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $arrival_currency;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $output_currency;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UsersBanks", inversedBy="movements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_bank_output;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UsersBanks", inversedBy="movements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_bank_arrival;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTransaction(): ?Transactions
    {
        return $this->id_transaction;
    }

    public function setIdTransaction(?Transactions $id_transaction): self
    {
        $this->id_transaction = $id_transaction;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->Reason;
    }

    public function setReason(string $Reason): self
    {
        $this->Reason = $Reason;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getArrivalCurrency(): ?string
    {
        return $this->arrival_currency;
    }

    public function setArrivalCurrency(string $arrival_currency): self
    {
        $this->arrival_currency = $arrival_currency;

        return $this;
    }

    public function getOutputCurrency(): ?string
    {
        return $this->output_currency;
    }

    public function setOutputCurrency(string $output_currency): self
    {
        $this->output_currency = $output_currency;

        return $this;
    }

    public function getIdBankOutput(): ?UsersBanks
    {
        return $this->id_bank_output;
    }

    public function setIdBankOutput(?UsersBanks $id_bank_output): self
    {
        $this->id_bank_output = $id_bank_output;

        return $this;
    }

    public function getIdBankArrival(): ?UsersBanks
    {
        return $this->id_bank_arrival;
    }

    public function setIdBankArrival(?UsersBanks $id_bank_arrival): self
    {
        $this->id_bank_arrival = $id_bank_arrival;

        return $this;
    }
}
