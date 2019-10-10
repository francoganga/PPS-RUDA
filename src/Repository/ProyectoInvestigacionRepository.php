<?php

namespace App\Repository;

use App\Entity\ProyectoInvestigacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProyectoInvestigacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProyectoInvestigacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProyectoInvestigacion[]    findAll()
 * @method ProyectoInvestigacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProyectoInvestigacionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProyectoInvestigacion::class);
    }

    // /**
    //  * @return ProyectoInvestigacion[] Returns an array of ProyectoInvestigacion objects
    //  */
    
    // public function findByPersona($persona)
    // {
    //     return $this->createQueryBuilder('p')
    //         ->innerJoin('App\Entity\MiembroProyecto', 'mp', 'WITH', 'mp.proyecto=p')
    //         ->innerJoin('App\Entity\Actividad', 'a', 'WITH', 'mp.id=a.id')
    //         ->innerJoin('App\Entity\Persona', 'pers', 'WITH', 'pers=a.persona')
    //         ->andWhere('pers=:personaParam')
    //         ->setParameter('personaParam', $persona)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }
    

    /*
    public function findOneBySomeField($value): ?ProyectoInvestigacion
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
