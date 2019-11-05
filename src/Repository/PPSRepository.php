<?php

namespace App\Repository;

use App\Entity\PPS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PPS|null find($id, $lockMode = null, $lockVersion = null)
 * @method PPS|null findOneBy(array $criteria, array $orderBy = null)
 * @method PPS[]    findAll()
 * @method PPS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PPSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PPS::class);
    }

    // /**
    //  * @return PPS[] Returns an array of PPS objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PPS
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
