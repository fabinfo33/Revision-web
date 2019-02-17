<?php

namespace App\Repository;

use App\Entity\TypeMorceaux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeMorceaux|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeMorceaux|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeMorceaux[]    findAll()
 * @method TypeMorceaux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeMorceauxRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeMorceaux::class);
    }

    // /**
    //  * @return TypeMorceaux[] Returns an array of TypeMorceaux objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeMorceaux
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
