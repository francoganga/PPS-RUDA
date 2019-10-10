<?php

namespace App\Repository;

use App\Entity\Actividad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Actividad|null find($id, $lockMode = null, $lockVersion = null)
 * @method Actividad|null findOneBy(array $criteria, array $orderBy = null)
 * @method Actividad[]    findAll()
 * @method Actividad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActividadRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Actividad::class);
    }

    // /**
    //  * @return Actividad[] Returns an array of Actividad objects
    //  */
    
    public function findByPersona($persona)
    {
        return $this->createQueryBuilder('a')
            ->Select('proy.nombre AS proyecto')
            ->addSelect('rp.nombre AS rol')
            ->addSelect('i.nombre AS instituto')
            ->addSelect('m.nombre AS materia')
            ->addSelect('ca.nombre AS carrera')
            ->innerJoin('a.persona', 'p')
            ->andWhere('a.persona = :persona')
            ->setParameter('persona', $persona)
            ->leftJoin('App\Entity\DirectorInstituto', 'di', 'WITH', 'di=a')
            ->leftJoin('App\Entity\Instituto', 'i', 'WITH', 'di.instituto=i')
            ->leftJoin('App\Entity\MiembroProyecto', 'mp', 'WITH', 'mp=a')
            ->leftJoin('App\Entity\Proyecto', 'proy', 'WITH', 'mp.proyecto=proy')
            ->leftJoin('App\Entity\Asambleista', 'asa', 'WITH', 'asa=a')
            ->leftJoin('App\Entity\ConsejeroSuperior', 'con', 'WITH', 'con=a')
            ->leftJoin('App\Entity\DirectorCarrera', 'dc', 'WITH', 'dc=a')
            ->leftJoin('App\Entity\Carrera', 'ca', 'WITH', 'dc.carrera=ca')
            ->leftJoin('App\Entity\CoordinadorMateria', 'cm', 'WITH', 'cm=a')
            ->leftJoin('App\Entity\Materia', 'm', 'WITH', 'm.coordinador=cm')
            ->leftJoin('App\Entity\RolProyecto', 'rp', 'WITH', 'mp.rol=rp')
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?Actividad
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
