<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InstitutoRepository")
 */
class Instituto
{   
    use NombreTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DirectorInstituto", mappedBy="instituto")
     */
    private $directores;

    public function __construct()
    {
        $this->directores = new ArrayCollection();
    }

    
    public function getId(): ?int
    {
        return $this->id;
    }

    
    /**
     * @return Collection|DirectorInstituto[]
     */
    public function getDirectores(): Collection
    {
        return $this->directores;
    }

    public function addDirectore(DirectorInstituto $directore): self
    {
        if (!$this->directores->contains($directore)) {
            $this->directores[] = $directore;
            $directore->setInstituto($this);
        }

        return $this;
    }

    public function removeDirectore(DirectorInstituto $directore): self
    {
        if ($this->directores->contains($directore)) {
            $this->directores->removeElement($directore);
            // set the owning side to null (unless already changed)
            if ($directore->getInstituto() === $this) {
                $directore->setInstituto(null);
            }
        }

        return $this;
    }
}
