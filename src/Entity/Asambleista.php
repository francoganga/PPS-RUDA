<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass="App\Repository\AsambleistaRepository")
 */

class Asambleista extends Actividad
{
    public function getDatos()
    {
        return $this->getPersona();
    }
}
