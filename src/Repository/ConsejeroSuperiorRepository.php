<?php

namespace App\Repository;

use App\Entity\ConsejeroSuperior;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ConsejeroSuperior|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConsejeroSuperior|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConsejeroSuperior[]    findAll()
 * @method ConsejeroSuperior[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConsejeroSuperiorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ConsejeroSuperior::class);
    }

    // /**
    //  * @return ConsejeroSuperior[] Returns an array of ConsejeroSuperior objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ConsejeroSuperior
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
