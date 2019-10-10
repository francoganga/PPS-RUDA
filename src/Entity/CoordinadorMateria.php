<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CoordinadorMateriaRepository")
 */
class CoordinadorMateria extends Actividad
{
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Materia", mappedBy="coordinador")
     */
    private $materias;

    public function __construct()
    {
        $this->materias = new ArrayCollection();
    }

    /**
     * @return Collection|Materia[]
     */
    public function getMaterias(): Collection
    {
        return $this->materias;
    }

    public function addMateria(Materia $materia): self
    {
        if (!$this->materias->contains($materia)) {
            $this->materias[] = $materia;
            $materia->setCoordinador($this);
        }

        return $this;
    }

    public function removeMateria(Materia $materia): self
    {
        if ($this->materias->contains($materia)) {
            $this->materias->removeElement($materia);
            // set the owning side to null (unless already changed)
            if ($materia->getCoordinador() === $this) {
                $materia->setCoordinador(null);
            }
        }

        return $this;
    }
}
