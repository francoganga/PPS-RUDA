<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\RolCCSRepository")
 */
class RolCCS
{
    use NombreTrait;
    /**
     * @ORM\Column(name="id", type="string")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ComisionConsejoSuperior", mappedBy="roles")
     */
    private $comisionesCS;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MiembroCCS", mappedBy="rol")
     */
    private $miembros;

    public function __construct()
    {
        $this->comisionesCS = new ArrayCollection();
        $this->miembros = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return Collection|ComisionConsejoSuperior[]
     */
    public function getComisionesCS(): Collection
    {
        return $this->comisionesCS;
    }

    public function addComisionesC(ComisionConsejoSuperior $comisionesC): self
    {
        if (!$this->comisionesCS->contains($comisionesC)) {
            $this->comisionesCS[] = $comisionesC;
        }

        return $this;
    }

    public function removeComisionesC(ComisionConsejoSuperior $comisionesC): self
    {
        if ($this->comisionesCS->contains($comisionesC)) {
            $this->comisionesCS->removeElement($comisionesC);
        }

        return $this;
    }

    /**
     * @return Collection|MiembroCCS[]
     */
    public function getMiembros(): Collection
    {
        return $this->miembros;
    }

    public function addMiembro(MiembroCCS $miembro): self
    {
        if (!$this->miembros->contains($miembro)) {
            $this->miembros[] = $miembro;
            $miembro->setRol($this);
        }

        return $this;
    }

    public function removeMiembro(MiembroCCS $miembro): self
    {
        if ($this->miembros->contains($miembro)) {
            $this->miembros->removeElement($miembro);
            // set the owning side to null (unless already changed)
            if ($miembro->getRol() === $this) {
                $miembro->setRol(null);
            }
        }

        return $this;
    }
}
