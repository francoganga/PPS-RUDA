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
    }
}
