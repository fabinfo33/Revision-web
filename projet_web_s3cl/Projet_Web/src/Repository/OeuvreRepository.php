<?php

namespace App\Repository;

use App\Entity\Oeuvre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Oeuvre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Oeuvre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Oeuvre[]    findAll()
 * @method Oeuvre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OeuvreRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Oeuvre::class);
    }

    /**
     * Renvoie les Oeuvres d'un Musicien
     * @param $id du Musicien
     * @return Oeuvre[]
     */
    public function findAllOeuvreOfMusicien($id) {
        $qb = $this->createQueryBuilder('o')
            ->innerJoin('o.composer', 'c')
            ->innerJoin('c.musicien', 'm')
            ->andWhere('c.codeMusicien = :id')
            ->setParameter('id', $id)
            ->getQuery();
        return $qb->execute();
    }

    // /**
    //  * @return Oeuvre[] Returns an array of Oeuvre objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Oeuvre
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
