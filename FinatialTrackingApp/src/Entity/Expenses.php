<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExpensesRepository")
 */
class Expenses
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Transactions", inversedBy="expenses")
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
     * @ORM\ManyToOne(targetEntity="App\Entity\SubFunds", inversedBy="expenses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_fund;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SubFunds", inversedBy="expenses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_SubFunds;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UsersBanks", inversedBy="expenses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_bank;

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

    public function getIdFund(): ?SubFunds
    {
        return $this->id_fund;
    }

    public function setIdFund(?SubFunds $id_fund): self
    {
        $this->id_fund = $id_fund;

        return $this;
    }

    public function getIdSubFunds(): ?SubFunds
    {
        return $this->id_SubFunds;
    }

    public function setIdSubFunds(?SubFunds $id_SubFunds): self
    {
        $this->id_SubFunds = $id_SubFunds;

        return $this;
    }

    public function getIdBank(): ?UsersBanks
    {
        return $this->id_bank;
    }

    public function setIdBank(?UsersBanks $id_bank): self
    {
        $this->id_bank = $id_bank;

        return $this;
    }
}
