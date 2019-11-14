<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"persona", "fecha"}},
 *      denormalizationContext={"groups"={"persona", "fecha"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\MovilidadConurbanoSurRepository")
 */
class MovilidadConurbanoSur extends Actividad
{
    public function getDatos()
    {
    }
}
