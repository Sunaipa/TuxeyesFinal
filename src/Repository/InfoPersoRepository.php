<?php

namespace App\Repository;

use App\Entity\InfoPerso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method InfoPerso|null find($id, $lockMode = null, $lockVersion = null)
 * @method InfoPerso|null findOneBy(array $criteria, array $orderBy = null)
 * @method InfoPerso[]    findAll()
 * @method InfoPerso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InfoPersoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, InfoPerso::class);
    }

    // /**
    //  * @return InfoPerso[] Returns an array of InfoPerso objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InfoPerso
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
