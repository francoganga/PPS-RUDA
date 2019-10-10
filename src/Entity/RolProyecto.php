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
     * @ORM\OneToMany(targetEntity="App\Entity\MiembroProyecto", mappedBy="rol")
     */
    private $miembros;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Proyecto", inversedBy="roles")
     */
    private $proyecto;

    public function __construct()
    {
        $this->miembros = new ArrayCollection();
    }

    public function getId(): ?String
    {
        return $this->id;
    }

    /**
     * @return Collection|MiembroProyecto[]
     */
    public function getMiembros(): Collection
    {
        return $this->miembros;
    }

    public function addMiembro(MiembroProyecto $miembro): self
    {
        if (!$this->miembros->contains($miembro)) {
            $this->miembros[] = $miembro;
            $miembro->setRol($this);
        }

        return $this;
    }

    public function removeMiembro(MiembroProyecto $miembro): self
    {
        if ($this->miembros->contains($miembro)) {
            $this->miembros->removeElement($miembro);
            // set the owning side to null (unless already changed)
            if ($miembro->getRol() === $this) {
                $miembro->setRol(null);
            }
        }

        return $this;
    }

    public function getProyecto(): ?Proyecto
    {
        return $this->proyecto;
    }

    public function setProyecto(?Proyecto $proyecto): self
    {
        $this->proyecto = $proyecto;

        return $this;
    }
}
