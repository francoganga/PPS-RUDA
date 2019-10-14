<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass="App\Repository\MiembroProyectoRepository")
 */
class MiembroProyecto extends Actividad
{
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Proyecto", inversedBy="miembros")
     */
    private $proyecto;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RolProyecto", inversedBy="miembros")
     */
    private $rol;


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

    public function getDatos()
    {
        return [
            "proyecto" => $this->proyecto,
            "rol" => $this->rol
        ];
    }
    public function getRoute()
    {
        $name = get_class($this->proyecto);
        $result = substr($name, 11);
        $result = strtolower($result);
        $result = "admin_app_".$result."_";
        return [
            "id" => $this->proyecto->getId(),
            "route" => $result
        ];
    }
}
