<?php

namespace App\Repository;

use App\Entity\Instituto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Instituto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Instituto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Instituto[]    findAll()
 * @method Instituto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InstitutoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Instituto::class);
    }

    // /**
    //  * @return Instituto[] Returns an array of Instituto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Instituto
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
