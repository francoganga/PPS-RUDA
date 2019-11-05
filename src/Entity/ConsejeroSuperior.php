<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"read"}},
 *      denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ConsejeroSuperiorRepository")
 */
class ConsejeroSuperior extends Actividad
{
    public function getDatos()
    {
        return $this->getPersona();
    }
}
