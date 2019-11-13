<?php

namespace App\Repository;

use App\Entity\Voluntariado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Voluntariado|null find($id, $lockMode = null, $lockVersion = null)
 * @method Voluntariado|null findOneBy(array $criteria, array $orderBy = null)
 * @method Voluntariado[]    findAll()
 * @method Voluntariado[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoluntariadoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Voluntariado::class);
    }

    // /**
    //  * @return Voluntariado[] Returns an array of Voluntariado objects
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
    public function findOneBySomeField($value): ?Voluntariado
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
