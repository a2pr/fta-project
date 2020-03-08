<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UsersBanks", mappedBy="id_user")
     */
    private $banks;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Funds", mappedBy="id_user")
     */
    private $funds;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SubFunds", mappedBy="id_user")
     */
    private $subFunds;

    public function __construct()
    {
        $this->banks = new ArrayCollection();
        $this->funds = new ArrayCollection();
        $this->subFunds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection|UsersBanks[]
     */
    public function getBanks(): Collection
    {
        return $this->banks;
    }

    public function addBank(UsersBanks $bank): self
    {
        if (!$this->banks->contains($bank)) {
            $this->banks[] = $bank;
            $bank->setIdUser($this);
        }

        return $this;
    }

    public function removeBank(UsersBanks $bank): self
    {
        if ($this->banks->contains($bank)) {
            $this->banks->removeElement($bank);
            // set the owning side to null (unless already changed)
            if ($bank->getIdUser() === $this) {
                $bank->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Funds[]
     */
    public function getFunds(): Collection
    {
        return $this->funds;
    }

    public function addFund(Funds $fund): self
    {
        if (!$this->funds->contains($fund)) {
            $this->funds[] = $fund;
            $fund->setIdUser($this);
        }

        return $this;
    }

    public function removeFund(Funds $fund): self
    {
        if ($this->funds->contains($fund)) {
            $this->funds->removeElement($fund);
            // set the owning side to null (unless already changed)
            if ($fund->getIdUser() === $this) {
                $fund->setIdUser(null);
            }
        }

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
            $subFund->setIdUser($this);
        }

        return $this;
    }

    public function removeSubFund(SubFunds $subFund): self
    {
        if ($this->subFunds->contains($subFund)) {
            $this->subFunds->removeElement($subFund);
            // set the owning side to null (unless already changed)
            if ($subFund->getIdUser() === $this) {
                $subFund->setIdUser(null);
            }
        }

        return $this;
    }
}
