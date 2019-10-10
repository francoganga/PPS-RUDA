<?php

namespace App\Repository;

use App\Entity\Asambleista;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Asambleista|null find($id, $lockMode = null, $lockVersion = null)
 * @method Asambleista|null findOneBy(array $criteria, array $orderBy = null)
 * @method Asambleista[]    findAll()
 * @method Asambleista[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AsambleistaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Asambleista::class);
    }

    // /**
    //  * @return Asambleista[] Returns an array of Asambleista objects
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
    public function findOneBySomeField($value): ?Asambleista
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
