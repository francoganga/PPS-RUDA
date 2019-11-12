<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ResponsableAreaRepository")
 */
class ResponsableArea extends Actividad
{
    /**
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
