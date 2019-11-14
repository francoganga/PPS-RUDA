<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"ccs", "nombre_parent"}},
 *      denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ComisionConsejoSuperiorRepository")
 */
class ComisionConsejoSuperior
{
    use NombreTrait;

    /**
     * @Groups({"write"})
     * @ORM\Column(name="id", type="string")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @Groups({"ccs"})
     * @ORM\OneToMany(targetEntity="App\Entity\MiembroCCS", mappedBy="comisionConsejoSuperior")
     */
    private $miembroCCS;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\RolCCS", inversedBy="comisionesCS")
     */
    private $roles;

    public function __construct()
    {
        $this->miembroCCS = new ArrayCollection();
        $this->roles = new ArrayCollection();
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

    /**
     * @return Collection|RolCCS[]
     */
    public function getRoles(): Collection
    {
        return $this->roles;
    }

    public function addRole(RolCCS $role): self
    {
        if (!$this->roles->contains($role)) {
            $this->roles[] = $role;
            $role->addComisionesC($this);
        }

        return $this;
    }

    public function removeRole(RolCCS $role): self
    {
        if ($this->roles->contains($role)) {
            $this->roles->removeElement($role);
            $role->removeComisionesC($this);
        }

        return $this;
    }
}
