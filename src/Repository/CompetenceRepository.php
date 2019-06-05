<?php

namespace App\Repository;

use App\Entity\Competence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Query\Expr\Join;

/**
 * @method Competence|null find($id, $lockMode = null, $lockVersion = null)
 * @method Competence|null findOneBy(array $criteria, array $orderBy = null)
 * @method Competence[]    findAll()
 * @method Competence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompetenceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Competence::class);
    }

    public function competenceFonc()
    {
        $qb = $this->createQueryBuilder("c");

        $qb
            ->innerJoin('App\Entity\TypeComp', 'tc', Join::WITH, 'tc = c.typeComp' )
            ->where(
                $qb->expr()->like('tc.categorie', ':competenceFonc')
            )
            ->setParameter('competenceFonc', 'Compétence fonctionnelle')
            ;
        return $qb->getQuery()->getResult();
    }

    public function allCompSaufFonc()
    {
        $qb = $this->createQueryBuilder("c");

        $qb
            ->innerJoin('App\Entity\TypeComp', 'tc', Join::WITH, 'tc = c.typeComp' )
            ->where(
                $qb->expr()->notlike('tc.categorie', ':competenceFonc')
            )
            ->setParameter('competenceFonc', 'Compétence fonctionnelle')
        ;

        dump($qb->getQuery()->getSQL());

        return $qb->getQuery()->getResult();
    }


    // /**
    //  * @return Competence[] Returns an array of Competence objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Competence
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
