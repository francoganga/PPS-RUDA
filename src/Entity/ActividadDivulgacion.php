<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ActividadDivulgacionRepository")
 */
class ActividadDivulgacion
{
    use NombreTrait;
    /**
     * @ORM\Column(name="id", type="string")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MiembroActividadDivulgacion", mappedBy="actividadDivulgacion")
     */
    private $miembros;

    public function __construct()
    {
        $this->miembros = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return Collection|MiembroActividadDivulgacion[]
     */
    public function getMiembros(): Collection
    {
        return $this->miembros;
    }

    public function addMiembro(MiembroActividadDivulgacion $miembro): self
    {
        if (!$this->miembros->contains($miembro)) {
            $this->miembros[] = $miembro;
            $miembro->setActividadDivulgacion($this);
        }

        return $this;
    }

    public function removeMiembro(MiembroActividadDivulgacion $miembro): self
    {
        if ($this->miembros->contains($miembro)) {
            $this->miembros->removeElement($miembro);
            // set the owning side to null (unless already changed)
            if ($miembro->getActividadDivulgacion() === $this) {
                $miembro->setActividadDivulgacion(null);
            }
        }

        return $this;
    }
}
