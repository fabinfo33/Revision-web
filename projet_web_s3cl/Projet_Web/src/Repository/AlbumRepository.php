<?php

namespace App\Repository;

use App\Entity\Album;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Album|null find($id, $lockMode = null, $lockVersion = null)
 * @method Album|null findOneBy(array $criteria, array $orderBy = null)
 * @method Album[]    findAll()
 * @method Album[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlbumRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Album::class);
    }

    /**
     * Renvoie les Genres qui contiennent des albums
     */
    public function findAllNotEmpty() : array {
        $conn = $this->getEntityManager()->getConnection();


        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * Trouve tous les Albums avec le Genre spécifié
     * @param $id du Genre
     * @return Album[]i
     */
    public function findAllByGenre($id) {
        $qb = $this->createQueryBuilder('a')
            ->innerJoin('a.genre', 'g')
            ->andWhere('g.codeGenre = :id')
            ->setParameter('id', $id)
            ->orderBy('a.titreAlbum', 'ASC')
            ->getQuery();

        return $qb->execute();
    }

    /**
     * Recherche d'albums commençant par $keyword
     * @param $keyword
     * @return Album[]
     */
    public function findAlbumsRecherche($keyword){
        $qb = $this->createQueryBuilder('a')
            ->where('a.titreAlbum LIKE :keyword')
            ->setParameter('keyword', $keyword.'%')
            ->getQuery();

        return $qb->execute();
    }

    // /**
    //  * @return Album[] Returns an array of Album objects
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
    public function findOneBySomeField($value): ?Album
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
