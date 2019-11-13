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
        return [
            "curso" => $this->getCursoExtension()
        ];
    }

    public function getRoute()
    {

        $child = get_class($this);
        $child = substr($child, 11);
        $child = strtolower($child);
        $parent = get_class($this->cursoExtension);
        $parent = substr($parent, 26);
        $parent = strtolower($parent);
        $result = "admin_app_".$parent."_".$child."_";

        return [
            "id" => $this->getCursoExtension()->getId(),
            "route" => $result,
            "childId" => $this->getId(),
        ];
    }
}
