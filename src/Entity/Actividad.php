<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use \Datetime;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"read"}},
 *      denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"director_instituto" = "DirectorInstituto",
 * "asambleista" = "Asambleista", "consejero_superior" = "ConsejeroSuperior",
 * "miembro_proyecto" = "MiembroProyecto", "director_carrera" = "DirectorCarrera",
 * "coordinador_materia" = "CoordinadorMateria", "miembro_ccs" = "MiembroCCS",
 * "miembro_pps" = "MiembroPPS", "miembro_actividadDivulgacion" = "MiembroActividadDivulgacion",
 * "miembro_cursoExtension" = "MiembroCursoExtension", "rector" = "Rector",
 * "reponsable_area" = "ResponsableArea",
 * "miembro_voluntariado" = "MiembroVoluntariado", "miembro_programa" = "MiembroPrograma",
 * "vinculador" = "Vinculador"})
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false, hardDelete=true)
 */
abstract class Actividad
{
    /*
     * Hook SoftDeleteable behavior
     * updates deletedAt field
     */
    use SoftDeleteableEntity;

    /*
     * Hook timestampable behavior
     * updates createdAt, updatedAt fields
     */
    use TimestampableEntity;

    /**
     * @ORM\Column(name="id", type="string")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @Groups({"read", "write"})
     * @ORM\Column(type="date")
     */
    private $inicio;

    /**
     * @Groups({"read", "write"})
     * @ORM\Column(type="date", nullable=true)
     */
    private $fin;

    /**
     * @Groups({"read", "write"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Persona", inversedBy="actividades", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $persona;

    public function getId(): ?String
    {
        return $this->id;
    }

    public function getInicio(): ?\DateTimeInterface
    {
        return $this->inicio;
    }

    public function setInicio(\DateTimeInterface $inicio): self
    {
        $this->inicio = $inicio;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(?\DateTimeInterface $fin): self
    {
        $this->fin = $fin;

        return $this;
    }

    public function getPersona(): ?Persona
    {
        return $this->persona;
    }

    public function setPersona(?Persona $persona): self
    {
        $this->persona = $persona;

        return $this;
    }

    abstract public function getDatos();

    public function isActive()
    {
        $dateNow = new DateTime(date('Y-m-d'));

        if ($dateNow > $this->inicio && $dateNow < $this->fin) {
            return true;
        }
        return false;
    }

    public function getFecha()
    {
        $inicio = $this->getInicio()->format('Y - M - d');
        $fin = "Indefinido";

        if ($this->getFin()) {
            $fin = $this->getFin()->format('Y - M - d');
        }

        return array("inicio" => $inicio, "fin" => $fin);
    }
    public function getRoute()
    {
        $name = get_class($this);
        $result = substr($name, 11);
        $result = strtolower($result);
        $result = "admin_app_".$result."_";
        return [
            "id" => $this->getId(),
            "route" => $result
        ];
    }

    public function __toString()
    {
        $entityName = get_class($this);
        $entityName = substr($entityName, 11);

        return $entityName;
    }
}
