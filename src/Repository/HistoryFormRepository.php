<?php

namespace App\Repository;

use App\Entity\HistoryForm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HistoryForm>
 *
 * @method HistoryForm|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoryForm|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoryForm[]    findAll()
 * @method HistoryForm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoryFormRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoryForm::class);
    }

//    /**
//     * @return HistoryForm[] Returns an array of HistoryForm objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?HistoryForm
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
