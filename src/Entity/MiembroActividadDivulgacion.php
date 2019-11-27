<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"persona", "fecha", "relacion"}},
 *      denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\MiembroActividadDivulgacionRepository")
 */
class MiembroActividadDivulgacion extends Actividad
{
    /**
     * @Groups({"relacion"})
     * @ORM\ManyToOne(targetEntity="App\Entity\ActividadDivulgacion", inversedBy="miembros")
     */
    private $actividadDivulgacion;

    public function getActividadDivulgacion(): ?ActividadDivulgacion
    {
        return $this->actividadDivulgacion;
    }

    public function setActividadDivulgacion(?ActividadDivulgacion $actividadDivulgacion): self
    {
        $this->actividadDivulgacion = $actividadDivulgacion;

        return $this;
    }

    public function getDatos()
    {
    }

    public function getRoute()
    {
        $child = get_class($this);

        $child = substr($child, 11);
        $child = strtolower($child);

        $parent = get_class($this->getActividadDivulgacion());
        $parent = substr($parent, 26);
        $parent = strtolower($parent);

        $result = "admin_app_".$parent."_".$child."_";
        return [
            "id" => $this->actividadDivulgacion->getId(),
            "route" => $result,
            "childId" => $this->getId()
        ];
    }
}
