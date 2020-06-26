<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TransactionsRepository")
 */
class Transactions
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_users;

    /**
     * @ORM\Column(type="float")
     */
    private $amount;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $money;

    /**
     * @ORM\Column(type="integer")
     */
    private $Operation;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Incomes", mappedBy="id_transaction", cascade={"persist", "remove"})
     */
    private $id_incomes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Expenses", mappedBy="id_transaction")
     */
    private $expenses;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Movements", mappedBy="id_transaction")
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
        $this->expenses = new ArrayCollection();
        $this->movements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getIdUsers(): ?users
    {
        return $this->id_users;
    }

    public function setIdUsers(?users $id_users): self
    {
        $this->id_users = $id_users;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getMoney(): ?string
    {
        return $this->money;
    }

    public function setMoney(string $money): self
    {
        $this->money = $money;

        return $this;
    }

    public function getOperation(): ?int
    {
        return $this->Operation;
    }

    public function setOperation(int $Operation): self
    {
        $this->Operation = $Operation;

        return $this;
    }

    public function getIncomeId(): ?Incomes
    {
        return $this->id_incomes;
    }

    /*public function setIncomes(?Incomes $incomes): self
    {
        $this->incomes = $incomes;

        // set (or unset) the owning side of the relation if necessary
        $newId_transaction = null === $incomes ? null : $this;
        if ($incomes->getIdTransaction() !== $newId_transaction) {
            $incomes->setIdTransaction($newId_transaction);
        }

        return $this;
    }*/

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
            $expense->setIdTransaction($this);
        }

        return $this;
    }

    public function removeExpense(Expenses $expense): self
    {
        if ($this->expenses->contains($expense)) {
            $this->expenses->removeElement($expense);
            // set the owning side to null (unless already changed)
            if ($expense->getIdTransaction() === $this) {
                $expense->setIdTransaction(null);
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
            $movement->setIdTransaction($this);
        }

        return $this;
    }

    public function removeMovement(Movements $movement): self
    {
        if ($this->movements->contains($movement)) {
            $this->movements->removeElement($movement);
            // set the owning side to null (unless already changed)
            if ($movement->getIdTransaction() === $this) {
                $movement->setIdTransaction(null);
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
