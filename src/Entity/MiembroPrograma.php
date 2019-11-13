<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\MiembroProgramaRepository")
 */
class MiembroPrograma extends Actividad
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Programa", inversedBy="miembros")
     */
    private $programa;

    public function getPrograma(): ?Programa
    {
        return $this->programa;
    }

    public function setPrograma(?Programa $programa): self
    {
        $this->programa = $programa;

        return $this;
    }

    public function getDatos()
    {
        return [
            "programa" => $this->getPrograma()
        ];
    }

    public function getRoute()
    {

        $child = get_class($this);

        $child = substr($child, 11);
        $child = strtolower($child);

        $parent = get_class($this->programa);
        $parent = substr($parent, 26);
        $parent = strtolower($parent);

        $result = "admin_app_".$parent."_".$child."_";
        return [
            "id" => $this->programa->getId(),
            "route" => $result,
            "childId" => $this->getId(),
        ];
    }
}
