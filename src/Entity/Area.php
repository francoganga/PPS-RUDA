<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\AreaRepository")
 */
class Area
{
    use NombreTrait;
    /**
     * @ORM\Column(name="id", type="string")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ResponsableArea", mappedBy="area", cascade={"persist", "remove"})
     */
    private $responsableArea;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getResponsableArea(): ?ResponsableArea
    {
        return $this->responsableArea;
    }

    public function setResponsableArea(?ResponsableArea $responsableArea): self
    {
        $this->responsableArea = $responsableArea;

        // set (or unset) the owning side of the relation if necessary
        $newArea = $responsableArea === null ? null : $this;
        if ($newArea !== $responsableArea->getArea()) {
            $responsableArea->setArea($newArea);
        }

        return $this;
    }
}
