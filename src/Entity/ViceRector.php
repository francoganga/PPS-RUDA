<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ViceRectorRepository")
 */
class ViceRector extends Actividad
{
    public function getDatos()
    {
    }
}
