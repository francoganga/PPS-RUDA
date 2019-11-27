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
     * @Groups({"read"})
     * @ORM\OneToMany(targetEntity="App\Entity\Actividad", mappedBy="persona", orphanRemoval=true)
     * @ORM\OrderBy({"inicio" = "ASC"})
     */
    private $actividades;

    /**
     * @Groups({"in"})
     * @ORM\Column(type="integer", unique=true, nullable=true)
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

    /**
     * @Groups({"read"})
     */
    private $descApmat;
    /**
     * @Groups({"read"})
     */
    private $nombre;
    /**
     * @Groups({"read"})
     */
    private $documento;
    /**
     * @Groups({"read"})
     */
    private $tipoDocumento;
    /**
     * @Groups({"read"})
     */
    private $numeroDocumento;
    /**
     * @Groups({"read"})
     */
    private $cuil;
    /**
     * @Groups({"read"})
     */
    private $tipoSexo;
    /**
     * @Groups({"read"})
     */
    private $fechaNacimiento;
    /**
     * @Groups({"read"})
     */
    private $estado;
    /**
     * @Groups({"read"})
     */
    private $descripcionEstado;
    /**
     * @Groups({"read"})
     */
    private $datosCombo;
    /**
     * @Groups({"read"})
     */
    private $fechaJubilacion;
    /**
     * @Groups({"read"})
     */
    private $fechaingreso;

    /**
     * @Groups({"in"})
     * @ORM\Column(type="integer", unique=true, nullable=true)
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

    public function getDescApmat()
    {
        return $this->descApmat;
    }

    public function setDescApmat($descApmat)
    {
        $this->descApmat = $descApmat;
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

    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;
    }

    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;
    }

    public function getCuil()
    {
        return $this->cuil;
    }

    public function setCuil($cuil)
    {
        $this->cuil = $cuil;
    }

    public function getTipoSexo()
    {
        return $this->tipoSexo;
    }

    public function setTipoSexo($tipoSexo)
    {
        $this->tipoSexo = $tipoSexo;
    }

    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getDescripcionEstado()
    {
        return $this->descripcionEstado;
    }

    public function setDescripcionEstado($descripcionEstado)
    {
        $this->descripcionEstado = $descripcionEstado;
    }

    public function getDatosCombo()
    {
        return $this->datosCombo;
    }

    public function setDatosCombo($datosCombo)
    {
        $this->datosCombo = $datosCombo;
    }

    public function getFechaJubilacion()
    {
        return $this->fechaJubilacion;
    }

    public function setFechaJubilacion($fechaJubilacion)
    {
        $this->fechaJubilacion = $fechaJubilacion;
    }

    public function getFechaingreso()
    {
        return $this->fechaingreso;
    }

    public function setFechaingreso($fechaingreso)
    {
        $this->fechaingreso = $fechaingreso;
    }
}
