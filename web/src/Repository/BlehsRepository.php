<?php

namespace App\Repository;

use App\Entity\Blehs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Blehs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Blehs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Blehs[]    findAll()
 * @method Blehs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlehsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Blehs::class);
    }

    // /**
    //  * @return Blehs[] Returns an array of Blehs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Blehs
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
