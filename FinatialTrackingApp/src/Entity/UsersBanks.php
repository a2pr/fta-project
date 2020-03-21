<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersBanksRepository")
 */
class UsersBanks
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\users", inversedBy="banks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Incomes", mappedBy="id_banco")
     */
    private $incomes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Expenses", mappedBy="id_banco")
     */
    private $expenses;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Movements", mappedBy="id_bank_output")
     */
    private $movements;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dtc;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dtm;

    public function __construct()
    {
        $this->incomes = new ArrayCollection();
        $this->expenses = new ArrayCollection();
        $this->movements = new ArrayCollection();
    }

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

    /**
     * @return Collection|Incomes[]
     */
    public function getIncomes(): Collection
    {
        return $this->incomes;
    }

    public function addIncome(Incomes $income): self
    {
        if (!$this->incomes->contains($income)) {
            $this->incomes[] = $income;
            $income->setIdBanco($this);
        }

        return $this;
    }

    public function removeIncome(Incomes $income): self
    {
        if ($this->incomes->contains($income)) {
            $this->incomes->removeElement($income);
            // set the owning side to null (unless already changed)
            if ($income->getIdBanco() === $this) {
                $income->setIdBanco(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Expenses[]
     */
    public function getExpenses(): Collection
    {
        return $this->expenses;
    }

    public function addExpense(Expenses $expense): self
    {
        if (!$this->expenses->contains($expense)) {
            $this->expenses[] = $expense;
            $expense->setIdBanco($this);
        }

        return $this;
    }

    public function removeExpense(Expenses $expense): self
    {
        if ($this->expenses->contains($expense)) {
            $this->expenses->removeElement($expense);
            // set the owning side to null (unless already changed)
            if ($expense->getIdBanco() === $this) {
                $expense->setIdBanco(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Movements[]
     */
    public function getMovements(): Collection
    {
        return $this->movements;
    }

    public function addMovement(Movements $movement): self
    {
        if (!$this->movements->contains($movement)) {
            $this->movements[] = $movement;
            $movement->setIdBankOutput($this);
        }

        return $this;
    }

    public function removeMovement(Movements $movement): self
    {
        if ($this->movements->contains($movement)) {
            $this->movements->removeElement($movement);
            // set the owning side to null (unless already changed)
            if ($movement->getIdBankOutput() === $this) {
                $movement->setIdBankOutput(null);
            }
        }

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
