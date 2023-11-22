<?php

namespace App\Repository;

use App\Entity\DemandesAdoptions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DemandesAdoptions>
 *
 * @method DemandesAdoptions|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandesAdoptions|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandesAdoptions[]    findAll()
 * @method DemandesAdoptions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandesAdoptionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DemandesAdoptions::class);
    }

//    /**
//     * @return DemandesAdoptions[] Returns an array of DemandesAdoptions objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DemandesAdoptions
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
