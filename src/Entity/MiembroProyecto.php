<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MiembroProyectoRepository")
 */
class MiembroProyecto extends Actividad
{
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MiembroProyectoRol", mappedBy="miembro")
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
            $miembroProyectoRole->setMiembro($this);
        }

        return $this;
    }

    public function removeMiembroProyectoRole(MiembroProyectoRol $miembroProyectoRole): self
    {
        if ($this->miembroProyectoRoles->contains($miembroProyectoRole)) {
            $this->miembroProyectoRoles->removeElement($miembroProyectoRole);
            // set the owning side to null (unless already changed)
            if ($miembroProyectoRole->getMiembro() === $this) {
                $miembroProyectoRole->setMiembro(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getPersona()->getNombre();
    }

}
