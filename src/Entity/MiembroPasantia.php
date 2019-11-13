<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\MiembroPasantiaRepository")
 */
class MiembroPasantia extends Actividad
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pasantia", inversedBy="miembros")
     */
    private $pasantia;

    public function getPasantia(): ?Pasantia
    {
        return $this->pasantia;
    }

    public function setPasantia(?Pasantia $pasantia): self
    {
        $this->pasantia = $pasantia;

        return $this;
    }

    public function getDatos()
    {
        return [
            "nombre" => $this->getPasantia()
        ];
    }

    public function getRoute()
    {

        $child = get_class($this);

        $child = substr($child, 11);
        $child = strtolower($child);

        $parent = get_class($this->pasantia);
        $parent = substr($parent, 26);
        $parent = strtolower($parent);

        $result = "admin_app_".$parent."_".$child."_";
        return [
            "id" => $this->pasantia->getId(),
            "route" => $result,
            "childId" => $this->getId(),
        ];
    }
}
