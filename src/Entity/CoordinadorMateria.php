<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"read"}},
 *      denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\CoordinadorMateriaRepository")
 */
class CoordinadorMateria extends Actividad
{
    /**
     * @Groups({"read"})
     * @ORM\OneToOne(targetEntity="App\Entity\Materia", cascade={"persist", "remove"})
     */
    private $materia;

    public function getDatos(): ?iterable
    {
        return [
            "materia" => $this->materia
        ];
    }

    public function getMateria(): ?Materia
    {
        return $this->materia;
    }

    public function setMateria(?Materia $materia): self
    {
        $this->materia = $materia;

        return $this;
    }
}
