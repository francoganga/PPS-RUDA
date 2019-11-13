<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PublicacionRepository")
 */
class Publicacion extends Actividad
{
    use NombreTrait;

    public function getDatos()
    {
    }
}
