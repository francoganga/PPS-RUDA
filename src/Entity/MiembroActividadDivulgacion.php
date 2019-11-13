<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\MiembroActividadDivulgacionRepository")
 */
class MiembroActividadDivulgacion extends Actividad
{
    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ActividadDivulgacion", inversedBy="miembro", cascade={"persist", "remove"})
     */
    private $actividadDivulgacion;


    public function getActividadDivulgacion(): ?ActividadDivulgacion
    {
        return $this->actividadDivulgacion;
    }

    public function setActividadDivulgacion(ActividadDivulgacion $actividadDivulgacion): self
    {
        $this->actividadDivulgacion = $actividadDivulgacion;

        return $this;
    }

    public function getDatos()
    {
        return [
            "nombre" => $this->getActividadDivulgacion()
        ];
    }

    public function getRoute()
    {
        $name = get_class($this->actividadDivulgacion);
        $result = substr($name, 26);
        $result = strtolower($result);
        $result = "admin_app_".$result."_";
        return [
            "id" => $this->actividadDivulgacion->getId(),
            "route" => $result
        ];
    }
}
