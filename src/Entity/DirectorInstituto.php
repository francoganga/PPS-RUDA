<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DirectorInstitutoRepository")
 */
class DirectorInstituto extends Actividad
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Instituto", inversedBy="directores")
     * @ORM\JoinColumn(nullable=false)
     */
    private $instituto;

    public function getInstituto(): ?Instituto
    {
        return $this->instituto;
    }

    public function setInstituto(?Instituto $instituto): self
    {
        $this->instituto = $instituto;

        return $this;
    }
}
