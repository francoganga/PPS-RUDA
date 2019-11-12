<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ActividadDivulgacionRepository")
 */
class ActividadDivulgacion
{
    use NombreTrait;

    /**
     * @ORM\Column(name="id", type="string")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\MiembroActividadDivulgacion", inversedBy="actividadDivulgacion")
     */
    private $miembro;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getMiembro(): ?MiembroActividadDivulgacion
    {
        return $this->miembro;
    }

    public function setMiembro(?MiembroActividadDivulgacion $miembro): self
    {
        $this->miembro = $miembro;

        return $this;
    }
}
