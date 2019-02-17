<?php

namespace App\Repository;

use App\Entity\Abonne;
use App\Entity\Achat;
use App\Entity\Enregistrement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Achat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Achat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Achat[]    findAll()
 * @method Achat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AchatRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Achat::class);
    }

    /**
     * Renvoie la liste des achats d'un Abonné
     * @param $id de l'abonné
     * @return Achat[]
     */
    public function findAllAchatOfOneAbonne($id) {
        $qb = $this->createQueryBuilder('a')
            ->innerJoin('a.abonne', 'abo')
            ->andWhere('abo.codeAbonne = :id')
            ->setParameter('id', $id)
            ->orderBy('a.codeAchat')
            ->getQuery();
        return $qb->execute();
    }

    /**
     * Renvoie les Achats confirmés de l'Abonné
     * @param $id de l'Abonné
     * @return Achat[]
     */
    public function findAllAchatConfirmeOfOneAbonne($id) {
        $qb = $this->createQueryBuilder('a')
            ->innerJoin('a.abonne', 'abo')
            ->andWhere('abo.codeAbonne = :id')
            ->andWhere('a.achatConfirme = 1')
            ->setParameter('id', $id)
            ->orderBy('a.codeAchat')
            ->getQuery();
        return $qb->execute();
    }

    /**
     * Renvoie les Achats non confirmés de l'Abonné
     * @param $id de l'Abonné
     * @return Achat[]
     */
    public function findAllAchatNonConfirmeOfOneAbonne($id) {
        $qb = $this->createQueryBuilder('a')
            ->innerJoin('a.abonne', 'abo')
            ->andWhere('abo.codeAbonne = :id')
            ->andWhere('a.achatConfirme = 0')
            ->setParameter('id', $id)
            ->orderBy('a.codeAchat')
            ->getQuery();
        return $qb->execute();
    }

    /**
     * Permet de confirmer un Achat
     * @param $id de l'Achat
     * @return Achat
     */
    public function confimerAchat($id) {
        $qb = $this->createQueryBuilder('a')
            ->update()
            ->set('a.achatConfirme', '1')
            ->where('a.codeAchat = :id')
            ->setParameter('id', $id)
            ->getQuery();
        return $qb->execute();
    }

    /**
     * Infirme un Achat
     * @param $id de l'Achat
     * @return Achat
     */
    public function infirmerAchat($id) {
        $qb = $this->createQueryBuilder('a')
            ->update()
            ->set('a.achatConfirme', '0')
            ->where('a.codeAchat = :id')
            ->setParameter('id', $id)
            ->getQuery();
        return $qb->execute();
    }

    /**
     * Permet d'ajouter un Enregistrement au panier
     * @param $idE id de l'Enregistrement
     * @param $idAbo id de l'Abonné
     */
    public function ajouterAchatPanier($idE, $idAbo) {
        $enregistrement = $this->getEntityManager()
            ->getRepository(Enregistrement::class)
            ->find($idE);
        $abonne = $this->getEntityManager()
            ->getRepository(Abonne::class)
            ->find($idAbo);
        $em = $this->getEntityManager();
        $achat = new Achat();
        $achat->setCodeEnregistrement($enregistrement)
            ->setEnregistrement($enregistrement)
            ->setCodeAbonne($abonne)
            ->setAbonne($abonne)
            ->setAchatConfirme('0');
        try {
            $em->persist($achat);
        } catch (ORMException $e) {
        }
        try {
            $em->flush();
        } catch (OptimisticLockException $e) {
        } catch (ORMException $e) {
        }
    }

    // /**
    //  * @return Achat[] Returns an array of Achat objects
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
    public function findOneBySomeField($value): ?Achat
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
