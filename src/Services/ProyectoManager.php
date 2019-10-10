<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\MiembroProyectoRol;

class ProyectoManager {

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function asignarMiembros($miembros, $proyecto, $rol)
    {
        foreach ($miembros as $miembro) {
            $mpr = new MiembroProyectoRol();

            $mpr->setProyecto($proyecto);
            $mpr->setMiembro($miembro);
            $mpr->setRol($rol);
            $this->em->persist($mpr);
            $this->em->persist($proyecto);
            $this->em->persist($miembro);
            $this->em->persist($rol);
            

        }
        $this->em->flush();
    }
}