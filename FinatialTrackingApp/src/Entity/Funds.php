<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FundsRepository")
 */
class Funds
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\users", inversedBy="funds")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SubFunds", mappedBy="id_funds")
     */
    private $subFunds;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Incomes", mappedBy="id_fund")
     */
    private $incomes;

    public function __construct()
    {
        $this->subFunds = new ArrayCollection();
        $this->incomes = new ArrayCollection();
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
     * @return Collection|SubFunds[]
     */
    public function getSubFunds(): Collection
    {
        return $this->subFunds;
    }

    public function addSubFund(SubFunds $subFund): self
    {
        if (!$this->subFunds->contains($subFund)) {
            $this->subFunds[] = $subFund;
            $subFund->setIdFunds($this);
        }

        return $this;
    }

    public function removeSubFund(SubFunds $subFund): self
    {
        if ($this->subFunds->contains($subFund)) {
            $this->subFunds->removeElement($subFund);
            // set the owning side to null (unless already changed)
            if ($subFund->getIdFunds() === $this) {
                $subFund->setIdFunds(null);
            }
        }

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
            $income->setIdFund($this);
        }

        return $this;
    }

    public function removeIncome(Incomes $income): self
    {
        if ($this->incomes->contains($income)) {
            $this->incomes->removeElement($income);
            // set the owning side to null (unless already changed)
            if ($income->getIdFund() === $this) {
                $income->setIdFund(null);
            }
        }

        return $this;
    }
}
