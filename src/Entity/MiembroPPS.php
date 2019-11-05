<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\MiembroPPSRepository")
 */
class MiembroPPS extends Actividad
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PPS", inversedBy="miembros")
     */
    private $pps;

    public function getPps(): ?PPS
    {
        return $this->pps;
    }

    public function setPps(?PPS $pps): self
    {
        $this->pps = $pps;

        return $this;
    }

    /**
    * Retorna datos a mostrar
    * en la pantalla de persona
     *
     * @return iterable
     */
    public function getDatos()
    {
        return [
            "pps" => $this->getPps()->getNombre()
        ];
    }
}
