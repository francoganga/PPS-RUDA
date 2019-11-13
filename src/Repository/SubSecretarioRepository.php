<?php

namespace App\Repository;

use App\Entity\SubSecretario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SubSecretario|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubSecretario|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubSecretario[]    findAll()
 * @method SubSecretario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubSecretarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubSecretario::class);
    }

    // /**
    //  * @return SubSecretario[] Returns an array of SubSecretario objects
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
    public function findOneBySomeField($value): ?SubSecretario
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
