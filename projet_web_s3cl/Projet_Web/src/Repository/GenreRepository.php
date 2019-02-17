<?php

namespace App\Repository;

use App\Entity\Album;
use App\Entity\Genre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Genre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Genre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Genre[]    findAll()
 * @method Genre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GenreRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Genre::class);
    }

    /**
     * Renvoie les Genres qui contiennent des albums
     */
    public function findAllNotEmpty() : array {
        $conn = $this->getEntityManager()->getConnection();
        $sql = 'select count(Code_Album) as nbAlbum, Libelle_Abrege, Genre.Code_Genre from Genre
        INNER JOIN Album A on Genre.Code_Genre = A.Code_Genre
        GROUP BY Libelle_Abrege, Genre.Code_Genre
        ORDER BY Libelle_Abrege';

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * Renvoie les Genres qui contiennent des albums sous forme d'entité Genre
     * @return Genre[];
     */
    public function findAllNotEmptyEntity() : array {
        $qb = $this->createQueryBuilder('g')
            ->innerJoin('g.album', 'a')
           // ->addSelect('COUNT(a.codeAlbum)')
            //->groupBy('g.libelleAbrege')->addGroupBy('g.codeGenre')
           // ->orderBy('g.libelleAbrege')
            ->getQuery();

        return $qb->execute();
    }




    // /**
    //  * @return Genre[] Returns an array of Genre objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Genre
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
