<?php

namespace App\Repository;

use App\Entity\Enregistrement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Enregistrement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Enregistrement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Enregistrement[]    findAll()
 * @method Enregistrement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnregistrementRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Enregistrement::class);
    }

    /**
     * Renvoie d'integralité des enregistrements correspondants
     * à une oeuvre.
     * @param $id L'id de l'oeuvre
     */
    public function findAllEnregistrementForOneOeuvre($id) {
        $qb = $this->createQueryBuilder('e')
            ->innerJoin(); //TODO
    }

    public function findAllEnregistrementForOneAlbum($id) : array {
        $conn = $this->getEntityManager()->getConnection();
        $sql = '
        SELECT * From Enregistrement
        INNER JOIN Composition_Disque C on Enregistrement.Code_Morceau = C.Code_Morceau
        INNER JOIN Disque D2 on C.Code_Disque = D2.Code_Disque
        INNER JOIN Album A on D2.Code_Album = A.Code_Album
        WHERE A.Code_Album = ?';

        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }

    /**
     * Renvoie les enregistrements en fonction d'un album
     * @param $id
     * @return Enregistrement[]
     */
    public function findAllEnregistrementForOneAlbumEntity($id) : array {
        $qb = $this->createQueryBuilder('e')
            ->innerJoin('e.compoDisque', 'c')
            ->innerJoin('c.disque', 'd')
            ->innerJoin('d.album', 'a')
            ->andWhere('a.codeAlbum = :id')
            ->setParameter('id', $id)
            ->orderBy('e.titre', 'ASC')
            ->getQuery();

        return $qb->execute();
    }

    /**
     * Renvoie l'enregistrement qui correspond à l'Achat
     * @param $id de l'Achat
     * @return Enregistrement
     */
    public function findEnregistrementForOneAchat($id) {
        $qb = $this->createQueryBuilder('e')
            ->innerJoin('e.achat', 'a')
            ->andWhere('a.codeAchat = :id')
            ->setParameter('id', $id)
            ->getQuery();

        return $qb->getOneOrNullResult();
    }

    // /**
    //  * @return Enregistrement[] Returns an array of Enregistrement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Enregistrement
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
