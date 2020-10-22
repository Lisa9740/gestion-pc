<?php

namespace App\Repository;

use App\Entity\Atribution;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Atribution|null find($id, $lockMode = null, $lockVersion = null)
 * @method Atribution|null findOneBy(array $criteria, array $orderBy = null)
 * @method Atribution[]    findAll()
 * @method Atribution[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AtributionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Atribution::class);
    }

    // /**
    //  * @return Atribution[] Returns an array of Atribution objects
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
    public function findOneBySomeField($value): ?Atribution
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
