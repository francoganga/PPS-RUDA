<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"proyecto_investigacion" = "ProyectoInvestigacion",
 * "proyecto_extension" = "ProyectoExtension"})
 */
abstract class Proyecto
{
    use NombreTrait;
    /**
     * @ORM\Column(name="id", type="string")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MiembroProyecto", mappedBy="proyecto")
     */
    private $miembros;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RolProyecto", mappedBy="proyecto")
     */
    private $roles;

    public function __construct()
    {
        $this->miembros = new ArrayCollection();
        $this->roles = new ArrayCollection();
    }

    public function getId(): ?string
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
            $miembro->setProyecto($this);
        }

        return $this;
    }

    public function removeMiembro(MiembroProyecto $miembro): self
    {
        if ($this->miembros->contains($miembro)) {
            $this->miembros->removeElement($miembro);
            // set the owning side to null (unless already changed)
            if ($miembro->getProyecto() === $this) {
                $miembro->setProyecto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RolProyecto[]
     */
    public function getRoles(): Collection
    {
        return $this->roles;
    }

    public function addRole(RolProyecto $role): self
    {
        if (!$this->roles->contains($role)) {
            $this->roles[] = $role;
            $role->setProyecto($this);
        }

        return $this;
    }

    public function removeRole(RolProyecto $role): self
    {
        if ($this->roles->contains($role)) {
            $this->roles->removeElement($role);
            // set the owning side to null (unless already changed)
            if ($role->getProyecto() === $this) {
                $role->setProyecto(null);
            }
        }

        return $this;
    }
}
