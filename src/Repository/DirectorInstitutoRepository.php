<?php

namespace App\Repository;

use App\Entity\DirectorInstituto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DirectorInstituto|null find($id, $lockMode = null, $lockVersion = null)
 * @method DirectorInstituto|null findOneBy(array $criteria, array $orderBy = null)
 * @method DirectorInstituto[]    findAll()
 * @method DirectorInstituto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DirectorInstitutoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DirectorInstituto::class);
    }

    // /**
    //  * @return DirectorInstituto[] Returns an array of DirectorInstituto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DirectorInstituto
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
