<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PPSRepository")
 */
class PPS
{
    use NombreTrait;

    /**
     * @ORM\Column(name="id", type="string")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MiembroPPS", mappedBy="pps")
     */
    private $miembros;

    public function __construct()
    {
        $this->miembros = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|MiembroPPS[]
     */
    public function getMiembros(): Collection
    {
        return $this->miembros;
    }

    public function addMiembro(MiembroPPS $miembro): self
    {
        if (!$this->miembros->contains($miembro)) {
            $this->miembros[] = $miembro;
            $miembro->setPps($this);
        }

        return $this;
    }

    public function removeMiembro(MiembroPPS $miembro): self
    {
        if ($this->miembros->contains($miembro)) {
            $this->miembros->removeElement($miembro);
            // set the owning side to null (unless already changed)
            if ($miembro->getPps() === $this) {
                $miembro->setPps(null);
            }
        }

        return $this;
    }
}
