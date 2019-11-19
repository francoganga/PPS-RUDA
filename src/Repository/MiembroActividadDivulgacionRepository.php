<?php

namespace App\Repository;

use App\Entity\MiembroActividadDivulgacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MiembroActividadDivulgacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method MiembroActividadDivulgacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method MiembroActividadDivulgacion[]    findAll()
 * @method MiembroActividadDivulgacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MiembroActividadDivulgacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MiembroActividadDivulgacion::class);
    }

    // /**
    //  * @return MiembroActividadDivulgacion[] Returns an array of MiembroActividadDivulgacion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MiembroActividadDivulgacion
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
