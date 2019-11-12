<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\MiembroCursoExtensionRepository")
 */
class MiembroCursoExtension extends Actividad
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CursoExtension", inversedBy="miembros")
     */
    private $cursoExtension;


    public function getCursoExtension(): ?CursoExtension
    {
        return $this->cursoExtension;
    }

    public function setCursoExtension(?CursoExtension $cursoExtension): self
    {
        $this->cursoExtension = $cursoExtension;

        return $this;
    }

    public function getDatos()
    {
    }
}
