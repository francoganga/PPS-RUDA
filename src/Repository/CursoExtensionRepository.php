<?php

namespace App\Repository;

use App\Entity\CursoExtension;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CursoExtension|null find($id, $lockMode = null, $lockVersion = null)
 * @method CursoExtension|null findOneBy(array $criteria, array $orderBy = null)
 * @method CursoExtension[]    findAll()
 * @method CursoExtension[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CursoExtensionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CursoExtension::class);
    }

    // /**
    //  * @return CursoExtension[] Returns an array of CursoExtension objects
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
    public function findOneBySomeField($value): ?CursoExtension
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
