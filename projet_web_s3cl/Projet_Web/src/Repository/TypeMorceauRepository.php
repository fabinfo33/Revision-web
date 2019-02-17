<?php

namespace App\Repository;

use App\Entity\TypeMorceau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeMorceau|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeMorceau|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeMorceau[]    findAll()
 * @method TypeMorceau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeMorceauRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeMorceau::class);
    }

    // /**
    //  * @return TypeMorceau[] Returns an array of TypeMorceau objects
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
    public function findOneBySomeField($value): ?TypeMorceau
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
