<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

trait NombreTrait{
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;
    
    public function __toString()
    {
        return $this->getNombre();
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }
}