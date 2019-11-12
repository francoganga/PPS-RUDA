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
     * @ORM\OneToOne(targetEntity="App\Entity\MiembroActividadDivulgacion", inversedBy="actividadDivulgacion")
     */
    private $actividadDivulgacion;

    public function getDatos()
    {
    }

    public function getActividadDivulgacion(): ?self
    {
        return $this->actividadDivulgacion;
    }

    public function setActividadDivulgacion(?self $actividadDivulgacion): self
    {
        $this->actividadDivulgacion = $actividadDivulgacion;

        return $this;
    }

    public function __toString()
    {
        return $this->getPersona()->getNombre();
    }
}
