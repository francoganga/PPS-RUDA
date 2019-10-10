<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RolProyectoRepository")
 */
class RolProyecto
{
    use NombreTrait;
    /**
     * @ORM\Column(name="id", type="string")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MiembroProyectoRol", mappedBy="rol")
     */
    private $miembroProyectoRoles;

    public function __construct()
    {
        $this->miembroProyectoRoles = new ArrayCollection();
    }

    /**
     * @return Collection|MiembroProyectoRol[]
     */
    public function getMiembroProyectoRoles(): Collection
    {
        return $this->miembroProyectoRoles;
    }

    public function addMiembroProyectoRole(MiembroProyectoRol $miembroProyectoRole): self
    {
        if (!$this->miembroProyectoRoles->contains($miembroProyectoRole)) {
            $this->miembroProyectoRoles[] = $miembroProyectoRole;
            $miembroProyectoRole->setRol($this);
        }

        return $this;
    }

    public function removeMiembroProyectoRole(MiembroProyectoRol $miembroProyectoRole): self
    {
        if ($this->miembroProyectoRoles->contains($miembroProyectoRole)) {
            $this->miembroProyectoRoles->removeElement($miembroProyectoRole);
            // set the owning side to null (unless already changed)
            if ($miembroProyectoRole->getRol() === $this) {
                $miembroProyectoRole->setRol(null);
            }
        }

        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    
}
