<?php

namespace App\Repository;

use App\Entity\InfoContact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method InfoContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method InfoContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method InfoContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InfoContactRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, InfoContact::class);
    }


    public function findAll()
    {
        return $this->createQueryBuilder('i')
            ->orderBy('i.dateEnvoi', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?InfoContact
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
