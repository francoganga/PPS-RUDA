<?php

namespace App\Repository;

use App\Entity\RolCCS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RolCCS|null find($id, $lockMode = null, $lockVersion = null)
 * @method RolCCS|null findOneBy(array $criteria, array $orderBy = null)
 * @method RolCCS[]    findAll()
 * @method RolCCS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RolCCSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RolCCS::class);
    }

    // /**
    //  * @return RolCCS[] Returns an array of RolCCS objects
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
    public function findOneBySomeField($value): ?RolCCS
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
