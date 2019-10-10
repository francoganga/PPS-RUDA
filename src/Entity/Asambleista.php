<?php

namespace App\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AsambleistaRepository")
 */

class Asambleista extends Actividad
{
    public function getDatos()
    {
        return $this->getPersona();
    }
}
