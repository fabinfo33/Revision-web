<?php

namespace App\Repository;

use App\Entity\Musicien;
use App\Entity\Oeuvre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DBALException;
use Doctrine\ORM\Query;
use function MongoDB\BSON\fromJSON;
use Symfony\Bridge\Doctrine\RegistryInterface;
use function Symfony\Component\DependencyInjection\Loader\Configurator\expr;

/**
 * @method Musicien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Musicien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Musicien[]    findAll()
 * @method Musicien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MusicienRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Musicien::class);
    }

    public function findAllQuery() : Query {
        return $this->createQueryBuilder('m')
            ->getQuery();
    }

    /**
     * Renvoie la liste des musicien qui ont composé une Oeuvre
     * @return Musicien[}
    */
    public function findAllMusicienAvecOeuvre() {
        $qb = $this->createQueryBuilder('m')
            ->innerJoin('m.composer', 'c')
            ->innerJoin('c.oeuvre', 'o')
            ->getQuery();
        return $qb->execute();
    }

    /**
     * Trouver le pays d'un musicien
     * @param $id
     * @return mixed
     */
    public function getPaysMusicien($id){
        $qb = $this->createQueryBuilder('m')
            ->innerJoin('m.codePays', 'p')
            ->where('p.codeMusicien = :id')
            ->setParameter('id', $id)
            ->getQuery();

        return $qb->execute();
    }

    /**
     * Recherche de musiciens commençant par $keyword
     * @param $keyword
     * @return Musicien[]
     */
    public function findMusiciensRecherche($keyword){
        $qb = $this->createQueryBuilder('m')
            ->where('m.nomMusicien LIKE :keyword')
            ->orWhere('m.prenomMusicien LIKE :keyword')
            ->setParameter('keyword', $keyword.'%')
            ->getQuery();

        return $qb->execute();
    }


    // /**
    //  * @return Musicien[] Returns an array of Musicien objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Musicien
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
