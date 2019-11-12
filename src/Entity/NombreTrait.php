<?php
namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

trait NombreTrait
{

    /**
     * @Groups({"read", "write"})
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
