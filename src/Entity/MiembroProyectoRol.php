<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MiembroProyectoRolRepository")
 */
class MiembroProyectoRol
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MiembroProyecto", inversedBy="miembroProyectoRoles")
     */
    private $miembro;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Proyecto", inversedBy="miembroProyectoRoles")
     */
    private $proyecto;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RolProyecto", inversedBy="miembroProyectoRoles")
     */
    private $rol;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMiembro(): ?MiembroProyecto
    {
        return $this->miembro;
    }

    public function setMiembro(?MiembroProyecto $miembro): self
    {
        $this->miembro = $miembro;

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

    public function getRol(): ?RolProyecto
    {
        return $this->rol;
    }

    public function setRol(?RolProyecto $rol): self
    {
        $this->rol = $rol;

        return $this;
    }
}
