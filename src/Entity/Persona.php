<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"read"}},
 * )
 * @ORM\Entity(repositoryClass="App\Repository\PersonaRepository")
 */
class Persona
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Actividad", mappedBy="persona", orphanRemoval=true)
     * @ORM\OrderBy({"inicio" = "ASC"})
     */
    private $actividades;

    /**
     * @Groups({"in"})
     * @ORM\Column(type="integer", unique=true)
     */
    private $id_mapuche;

    /**
     * Datos mapuche
     */
    private $agente;
    /**
     * @Groups({"read"})
     */
    private $apellido;
    private $desc_apmat;
    private $nombre;
    private $documento;
    private $tipo_documento;
    private $numero_documento;
    private $cuil;
    private $tipo_sexo;
    private $fecha_nacimiento;
    private $estado;
    private $descripcion_estado;
    private $datos_combo;
    private $fecha_jubilacion;
    private $fecha_ingreso;

    /**
     * @Groups({"in"})
     * @ORM\Column(type="integer", unique=true)
     */
    private $id_guarani;

    public function __construct()
    {
        $this->actividades = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Actividad[]
     */
    public function getActividades(): Collection
    {
        return $this->actividades;
    }

    public function addActividade(Actividad $actividade): self
    {
        if (!$this->actividades->contains($actividade)) {
            $this->actividades[] = $actividade;
            $actividade->setPersona($this);
        }

        return $this;
    }

    public function removeActividade(Actividad $actividade): self
    {
        if ($this->actividades->contains($actividade)) {
            $this->actividades->removeElement($actividade);
            // set the owning side to null (unless already changed)
            if ($actividade->getPersona() === $this) {
                $actividade->setPersona(null);
            }
        }

        return $this;
    }

    public function getIdMapuche(): ?int
    {
        return $this->id_mapuche;
    }

    public function setIdMapuche(int $id_mapuche): self
    {
        $this->id_mapuche = $id_mapuche;

        return $this;
    }

    public function getIdGuarani(): ?int
    {
        return $this->id_guarani;
    }

    public function setIdGuarani(int $id_guarani): self
    {
        $this->id_guarani = $id_guarani;

        return $this;
    }
    public function getAgente()
    {
        return $this->agente;
    }

    public function setAgente($agente)
    {
        $this->agente = $agente;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getDesc_apmat()
    {
        return $this->desc_apmat;
    }

    public function setDesc_apmat($desc_apmat)
    {
        $this->desc_apmat = $desc_apmat;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getDocumento()
    {
        return $this->documento;
    }

    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }

    public function getTipo_documento()
    {
        return $this->tipo_documento;
    }

    public function setTipo_documento($tipo_documento)
    {
        $this->tipo_documento = $tipo_documento;
    }

    public function getNumero_documento()
    {
        return $this->numero_documento;
    }

    public function setNumero_documento($numero_documento)
    {
        $this->numero_documento = $numero_documento;
    }

    public function getCuil()
    {
        return $this->cuil;
    }

    public function setCuil($cuil)
    {
        $this->cuil = $cuil;
    }

    public function getTipo_sexo()
    {
        return $this->tipo_sexo;
    }

    public function setTipo_sexo($tipo_sexo)
    {
        $this->tipo_sexo = $tipo_sexo;
    }

    public function getFecha_nacimiento()
    {
        return $this->fecha_nacimiento;
    }

    public function setFecha_nacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getDescripcion_estado()
    {
        return $this->descripcion_estado;
    }

    public function setDescripcion_estado($descripcion_estado)
    {
        $this->descripcion_estado = $descripcion_estado;
    }

    public function getDatos_combo()
    {
        return $this->datos_combo;
    }

    public function setDatos_combo($datos_combo)
    {
        $this->datos_combo = $datos_combo;
    }

    public function getFecha_jubilacion()
    {
        return $this->fecha_jubilacion;
    }

    public function setFecha_jubilacion($fecha_jubilacion)
    {
        $this->fecha_jubilacion = $fecha_jubilacion;
    }

    public function getFecha_ingreso()
    {
        return $this->fecha_ingreso;
    }

    public function setFecha_ingreso($fecha_ingreso)
    {
        $this->fecha_ingreso = $fecha_ingreso;
    }
}
