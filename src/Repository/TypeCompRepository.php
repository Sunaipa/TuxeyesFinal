<?php

namespace App\Repository;

use App\Entity\TypeComp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Query\Expr\Join;

/**
 * @method TypeComp|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeComp|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeComp[]    findAll()
 * @method TypeComp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeCompRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeComp::class);
    }


    public function allTypeCompSaufFonc()
    {
        $qb = $this->createQueryBuilder("tc");

        $qb
            ->where(
                $qb->expr()->notlike('tc.categorie', ':competenceFonc')
            )
            ->setParameter('competenceFonc', 'Catégorie n°1')
        ;

        dump($qb->getQuery()->getSQL());

        return $qb->getQuery()->getResult();
    }




/*
    public function allCompSaufFonc()
    {
        $qb = $this->createQueryBuilder("tc");

        $qb
            ->innerJoin('App\Entity\Competence', 'c', Join::WITH, 'c = tc.competences' )
        ;
        return $qb->getQuery()->getResult();
    }

   */

    // /**
    //  * @return TypeComp[] Returns an array of TypeComp objects
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
    public function findOneBySomeField($value): ?TypeComp
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
