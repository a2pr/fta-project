<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IncomesRepository")
 */
class Incomes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\transactions", inversedBy="incomes", cascade={"persist", "remove"})
     */
    private $id_transaction;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Reason;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Funds", inversedBy="incomes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $id_fund;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Subfunds", inversedBy="incomes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $id_SubFunds;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UsersBanks", inversedBy="incomes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_bank;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dtc;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dtm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTransaction(): ?transactions
    {
        return $this->id_transaction;
    }

    public function setIdTransaction(?transactions $id_transaction): self
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

    public function getIdFund(): ?Funds
    {
        return $this->id_fund;
    }

    public function setIdFund(?Funds $id_fund): self
    {
        $this->id_fund = $id_fund;

        return $this;
    }

    public function getIdSubFunds(): ?Subfunds
    {
        return $this->id_SubFunds;
    }

    public function setIdSubFunds(?Subfunds $id_SubFunds): self
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

    public function getDtc(): ?\DateTimeInterface
    {
        return $this->dtc;
    }

    public function setDtc(\DateTimeInterface $dtc): self
    {
        $this->dtc = $dtc;

        return $this;
    }

    public function getDtm(): ?\DateTimeInterface
    {
        return $this->dtm;
    }

    public function setDtm(\DateTimeInterface $dtm): self
    {
        $this->dtm = $dtm;

        return $this;
    }
}
