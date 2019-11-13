<?php

namespace App\Repository;

use App\Entity\ViceRector;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ViceRector|null find($id, $lockMode = null, $lockVersion = null)
 * @method ViceRector|null findOneBy(array $criteria, array $orderBy = null)
 * @method ViceRector[]    findAll()
 * @method ViceRector[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ViceRectorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ViceRector::class);
    }

    // /**
    //  * @return ViceRector[] Returns an array of ViceRector objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ViceRector
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
