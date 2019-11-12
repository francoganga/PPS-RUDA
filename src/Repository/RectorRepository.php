<?php

namespace App\Repository;

use App\Entity\Rector;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Rector|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rector|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rector[]    findAll()
 * @method Rector[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RectorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rector::class);
    }

    // /**
    //  * @return Rector[] Returns an array of Rector objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rector
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
