<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ComisionConsejoSuperiorRepository")
 */
class ComisionConsejoSuperior
{
    use NombreTrait;

    /**
     * @ORM\Column(name="id", type="string")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MiembroCCS", mappedBy="comisionConsejoSuperior")
     */
    private $miembroCCS;

    public function __construct()
    {
        $this->miembroCCS = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return Collection|MiembroCCS[]
     */
    public function getMiembroCCS(): Collection
    {
        return $this->miembroCCS;
    }

    public function addMiembroCC(MiembroCCS $miembroCC): self
    {
        if (!$this->miembroCCS->contains($miembroCC)) {
            $this->miembroCCS[] = $miembroCC;
            $miembroCC->setComisionConsejoSuperior($this);
        }

        return $this;
    }

    public function removeMiembroCC(MiembroCCS $miembroCC): self
    {
        if ($this->miembroCCS->contains($miembroCC)) {
            $this->miembroCCS->removeElement($miembroCC);
            // set the owning side to null (unless already changed)
            if ($miembroCC->getComisionConsejoSuperior() === $this) {
                $miembroCC->setComisionConsejoSuperior(null);
            }
        }

        return $this;
    }
}
