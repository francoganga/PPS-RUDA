<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarreraRepository")
 */
class Carrera
{
    use NombreTrait;
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\DirectorCarrera", mappedBy="carrera", cascade={"persist", "remove"})
     */
    private $directorCarrera;
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDirectorCarrera(): ?DirectorCarrera
    {
        return $this->directorCarrera;
    }

    public function setDirectorCarrera(DirectorCarrera $directorCarrera): self
    {
        $this->directorCarrera = $directorCarrera;

        // set the owning side of the relation if necessary
        if ($this !== $directorCarrera->getCarrera()) {
            $directorCarrera->setCarrera($this);
        }

        return $this;
    }
}
