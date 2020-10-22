<?php

namespace App\Entity;

use App\Repository\ComputerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComputerRepository::class)
 */
class Computer
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Atribution::class, mappedBy="computer")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

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
            $atribution->setComputer($this);
        }

        return $this;
    }

    public function removeAtribution(Atribution $atribution): self
    {
        if ($this->atributions->contains($atribution)) {
            $this->atributions->removeElement($atribution);
            // set the owning side to null (unless already changed)
            if ($atribution->getComputer() === $this) {
                $atribution->setComputer(null);
            }
        }

        return $this;
    }
}
