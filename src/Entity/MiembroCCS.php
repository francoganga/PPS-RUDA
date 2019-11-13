<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"read"}},
 *      denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\MiembroCCSRepository")
 */
class MiembroCCS extends Actividad
{
    /**
     * @Groups({"read", "write"})
     * @ORM\ManyToOne(targetEntity="App\Entity\ComisionConsejoSuperior", inversedBy="miembroCCS")
     */
    private $comisionConsejoSuperior;

    /**
     * @Groups({"read", "write"})
     * @ORM\OneToOne(targetEntity="App\Entity\ResolucionAdministrativa", cascade={"persist", "remove"})
     */
    private $resolucionAdministrativa;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RolCCS", inversedBy="miembros")
     */
    private $rol;


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

    public function getRol(): ?RolCCS
    {
        return $this->rol;
    }

    public function setRol(?RolCCS $rol): self
    {
        $this->rol = $rol;

        return $this;
    }
}
