<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"relacion", "persona", "fecha"}},
 *      denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\MiembroVoluntariadoRepository")
 */
class MiembroVoluntariado extends Actividad
{
    /**
     * @Groups({"relacion"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Voluntariado", inversedBy="miembros")
     */
    private $voluntariado;


    public function getVoluntariado(): ?Voluntariado
    {
        return $this->voluntariado;
    }

    public function setVoluntariado(?Voluntariado $voluntariado): self
    {
        $this->voluntariado = $voluntariado;

        return $this;
    }

    public function getDatos()
    {
        return [
            "nombre" => $this->getVoluntariado()
        ];
    }

    public function getRoute()
    {

        $child = get_class($this);

        $child = substr($child, 11);
        $child = strtolower($child);

        $parent = get_class($this->voluntariado);
        $parent = substr($parent, 26);
        $parent = strtolower($parent);

        $result = "admin_app_".$parent."_".$child."_";
        return [
            "id" => $this->voluntariado->getId(),
            "route" => $result,
            "childId" => $this->getId(),
        ];
    }
}
