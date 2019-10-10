<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MateriaRepository")
 */
class Materia
{   
    use NombreTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CoordinadorMateria", inversedBy="materias")
     * @ORM\JoinColumn(nullable=true)
     */
    private $coordinador;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoordinador(): ?CoordinadorMateria
    {
        return $this->coordinador;
    }

    public function setCoordinador(?CoordinadorMateria $coordinador): self
    {
        $this->coordinador = $coordinador;

        return $this;
    }
}
