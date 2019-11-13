<?php

namespace App\Repository;

use App\Entity\Secretario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Secretario|null find($id, $lockMode = null, $lockVersion = null)
 * @method Secretario|null findOneBy(array $criteria, array $orderBy = null)
 * @method Secretario[]    findAll()
 * @method Secretario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SecretarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Secretario::class);
    }

    // /**
    //  * @return Secretario[] Returns an array of Secretario objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Secretario
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
