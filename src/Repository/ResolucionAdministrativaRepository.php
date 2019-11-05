<?php

namespace App\Repository;

use App\Entity\ResolucionAdministrativa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ResolucionAdministrativa|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResolucionAdministrativa|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResolucionAdministrativa[]    findAll()
 * @method ResolucionAdministrativa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResolucionAdministrativaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResolucionAdministrativa::class);
    }

    // /**
    //  * @return ResolucionAdministrativa[] Returns an array of ResolucionAdministrativa objects
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
    public function findOneBySomeField($value): ?ResolucionAdministrativa
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
