<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"read"}},
 *      denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\MiembroPPSRepository")
 */
class MiembroPPS extends Actividad
{
    /**
     * @Groups({"read", "write"})
     * @ORM\ManyToOne(targetEntity="App\Entity\PPS", inversedBy="miembros")
     */
    private $pps;

    public function getPps(): ?PPS
    {
        return $this->pps;
    }

    public function setPps(?PPS $pps): self
    {
        $this->pps = $pps;

        return $this;
    }

    /**
    * Retorna datos a mostrar
    * en la pantalla de persona
     *
     * @return iterable
     */
    public function getDatos()
    {
        return [
            "pps" => $this->getPps()->getNombre()
        ];
    }

    public function getRoute()
    {

        /* admin_app_comisionconsejosuperior_miembroccs_show */
        $child = get_class($this);

        $child = substr($child, 11);
        $child = strtolower($child);

        $parent = get_class($this->pps);
        $parent = substr($parent, 26);
        $parent = strtolower($parent);

        $result = "admin_app_".$parent."_".$child."_";
        return [
            "id" => $this->pps->getId(),
            "route" => $result,
            "childId" => $this->getId(),
        ];
    }
}
