<?php

namespace App\Repository;

use App\Entity\MiembroPasantia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MiembroPasantia|null find($id, $lockMode = null, $lockVersion = null)
 * @method MiembroPasantia|null findOneBy(array $criteria, array $orderBy = null)
 * @method MiembroPasantia[]    findAll()
 * @method MiembroPasantia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MiembroPasantiaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MiembroPasantia::class);
    }

    // /**
    //  * @return MiembroPasantia[] Returns an array of MiembroPasantia objects
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
    public function findOneBySomeField($value): ?MiembroPasantia
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
