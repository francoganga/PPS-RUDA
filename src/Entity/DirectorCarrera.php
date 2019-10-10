<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DirectorCarreraRepository")
 */
class DirectorCarrera extends Actividad
{   
    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Carrera", inversedBy="directorCarrera", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $carrera;

    public function getCarrera(): ?Carrera
    {
        return $this->carrera;
    }

    public function setCarrera(Carrera $carrera): self
    {
        $this->carrera = $carrera;

        return $this;
    }
    

    
}
