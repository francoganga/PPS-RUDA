<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\SecretarioRepository")
 */
class Secretario extends Actividad
{
    public function getDatos()
    {
    }
}
