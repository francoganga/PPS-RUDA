<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\MiembroCCSRepository")
 */
class MiembroCCS extends Actividad
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ComisionConsejoSuperior", inversedBy="miembroCCS")
     */
    private $comisionConsejoSuperior;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ResolucionAdministrativa", cascade={"persist", "remove"})
     */
    private $resolucionAdministrativa;


    public function getComisionConsejoSuperior(): ?ComisionConsejoSuperior
    {
        return $this->comisionConsejoSuperior;
    }

    public function setComisionConsejoSuperior(?ComisionConsejoSuperior $comisionConsejoSuperior): self
    {
        $this->comisionConsejoSuperior = $comisionConsejoSuperior;

        return $this;
    }

    public function getResolucionAdministrativa(): ?ResolucionAdministrativa
    {
        return $this->resolucionAdministrativa;
    }

    public function setResolucionAdministrativa(?ResolucionAdministrativa $resolucionAdministrativa): self
    {
        $this->resolucionAdministrativa = $resolucionAdministrativa;

        return $this;
    }

    /**
    * Retorna datos a mostrar
    * en la pantalla de persona
     *
     * @return void
     */
    public function getDatos()
    {
        return [
            "comision" => $this->getComisionConsejoSuperior()->getNombre()
        ];
    }

    public function getRoute()
    {

        /* admin_app_comisionconsejosuperior_miembroccs_show */
        $child = get_class($this);

        $child = substr($child, 11);
        $child = strtolower($child);

        $parent = get_class($this->comisionConsejoSuperior);
        $parent = substr($parent, 26);
        $parent = strtolower($parent);

        $result = "admin_app_".$parent."_".$child."_";
        return [
            "id" => $this->comisionConsejoSuperior->getId(),
            "route" => $result,
            "childId" => $this->getId(),
        ];
    }
}
