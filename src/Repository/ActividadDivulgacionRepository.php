<?php

namespace App\Repository;

use App\Entity\ActividadDivulgacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ActividadDivulgacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActividadDivulgacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActividadDivulgacion[]    findAll()
 * @method ActividadDivulgacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActividadDivulgacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActividadDivulgacion::class);
    }

    // /**
    //  * @return ActividadDivulgacion[] Returns an array of ActividadDivulgacion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ActividadDivulgacion
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
