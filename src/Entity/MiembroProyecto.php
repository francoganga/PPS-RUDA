<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"read"}},
 *      denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\MiembroProyectoRepository")
 */
class MiembroProyecto extends Actividad
{

    /**
     * @Groups({"read", "write"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Proyecto", inversedBy="miembros")
     */
    private $proyecto;

    /**
     * @Groups({"read", "write"})
     * @ORM\ManyToOne(targetEntity="App\Entity\RolProyecto", inversedBy="miembros")
     */
    private $rol;


    public function getProyecto(): ?Proyecto
    {
        return $this->proyecto;
    }

    public function setProyecto(?Proyecto $proyecto): self
    {
        $this->proyecto = $proyecto;

        return $this;
    }

    public function getRol(): ?RolProyecto
    {
        return $this->rol;
    }

    public function setRol(?RolProyecto $rol): self
    {
        $this->rol = $rol;

        return $this;
    }

    public function getDatos()
    {
        return [
            "proyecto" => $this->proyecto,
            "rol" => $this->rol
        ];
    }

    public function getRoute()
    {

        $child = get_class($this);

        $child = substr($child, 11);
        $child = strtolower($child);

        $parent = get_class($this->getProyecto());
        $parent = substr($parent, 11);
        $parent = strtolower($parent);

        $result = "admin_app_".$parent."_".$child."_";
        return [
            "id" => $this->proyecto->getId(),
            "route" => $result,
            "childId" => $this->getId()
        ];
    }
}
