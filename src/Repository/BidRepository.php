<?php

namespace App\Repository;

use App\Entity\Bid;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface; 

/**
 * @extends ServiceEntityRepository<Bid>
 *
 * @method Bid|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bid|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bid[]    findAll()
 * @method Bid[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BidRepository extends ServiceEntityRepository
{
    private $entityManager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, Bid::class);
        $this->entityManager = $entityManager;
    }

    public function add(Bid $bid): void
    {
        $this->entityManager->persist($bid);
        $this->entityManager->flush();
    }

    public function edit(Bid $bid): void
    {
        $this->entityManager->flush();
    }

    public function delete(Bid $bid): void
    {
        $this->entityManager->remove($bid);
        $this->entityManager->flush();
    }

    public function findHighestBidForAuction($auctionId)
    {
        return $this->createQueryBuilder('b')
            ->select('MAX(b.bidamount) AS maxBid')
            ->leftJoin('b.idAuction', 'a')
            ->andWhere('a.id = :auctionId')
            ->setParameter('auctionId', $auctionId)
            ->getQuery()
            ->getSingleScalarResult();
    }
//     * @return Bid[] Returns an array of Bid objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Bid
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
