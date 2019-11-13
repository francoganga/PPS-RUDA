<?php

namespace App\Repository;

use App\Entity\BecaBefat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BecaBefat|null find($id, $lockMode = null, $lockVersion = null)
 * @method BecaBefat|null findOneBy(array $criteria, array $orderBy = null)
 * @method BecaBefat[]    findAll()
 * @method BecaBefat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BecaBefatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BecaBefat::class);
    }

    // /**
    //  * @return BecaBefat[] Returns an array of BecaBefat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BecaBefat
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
