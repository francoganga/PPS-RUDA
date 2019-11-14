<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"nombre", "persona", "fecha"}},
 *      denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ResponsableAreaRepository")
 */
class ResponsableArea extends Actividad
{
    /**
     * @Groups({"nombre"})
     * @ORM\OneToOne(targetEntity="App\Entity\Area", inversedBy="responsableArea", cascade={"persist", "remove"})
     */
    private $area;

    public function getArea(): ?Area
    {
        return $this->area;
    }

    public function setArea(?Area $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getDatos()
    {
    }
}
