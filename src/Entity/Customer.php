<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 */
class Customer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\OneToMany(targetEntity=Atribution::class, mappedBy="customer")
     */
    private $atributions;

    public function __construct()
    {
        $this->atributions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return Collection|Atribution[]
     */
    public function getAtributions(): Collection
    {
        return $this->atributions;
    }

    public function addAtribution(Atribution $atribution): self
    {
        if (!$this->atributions->contains($atribution)) {
            $this->atributions[] = $atribution;
            $atribution->setCustomer($this);
        }

        return $this;
    }

    public function removeAtribution(Atribution $atribution): self
    {
        if ($this->atributions->contains($atribution)) {
            $this->atributions->removeElement($atribution);
            // set the owning side to null (unless already changed)
            if ($atribution->getCustomer() === $this) {
                $atribution->setCustomer(null);
            }
        }

        return $this;
    }
}
