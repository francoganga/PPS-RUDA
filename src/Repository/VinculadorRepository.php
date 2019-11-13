<?php

namespace App\Repository;

use App\Entity\Vinculador;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Vinculador|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vinculador|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vinculador[]    findAll()
 * @method Vinculador[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VinculadorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vinculador::class);
    }

    // /**
    //  * @return Vinculador[] Returns an array of Vinculador objects
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
    public function findOneBySomeField($value): ?Vinculador
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
