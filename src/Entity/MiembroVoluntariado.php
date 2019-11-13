<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\MiembroVoluntariadoRepository")
 */
class MiembroVoluntariado extends Actividad
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Voluntariado", inversedBy="miembros")
     */
    private $voluntariado;


    public function getVoluntariado(): ?Voluntariado
    {
        return $this->voluntariado;
    }

    public function setVoluntariado(?Voluntariado $voluntariado): self
    {
        $this->voluntariado = $voluntariado;

        return $this;
    }

    public function getDatos()
    {
        return [
            "nombre" => $this->getVoluntariado()
        ];
    }
}
