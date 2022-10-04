<?php

namespace App\Repository;

use App\Entity\TomeMangas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TomeMangas>
 *
 * @method TomeMangas|null find($id, $lockMode = null, $lockVersion = null)
 * @method TomeMangas|null findOneBy(array $criteria, array $orderBy = null)
 * @method TomeMangas[]    findAll()
 * @method TomeMangas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TomeMangasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TomeMangas::class);
    }

    public function save(TomeMangas $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TomeMangas $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /** Retourne les 6 derniers tomes ajoutés sur le site
    *
    * @return array
    */
   public function getLastTomeMangas()  {

        $qb = $this->createQueryBuilder('a')
        ->orderBy('a.createdAt', 'DESC')
        ->innerJoin('a.idManga', 'c');
        $query = $qb->getQuery();
        $query->setMaxResults(6);
        return $query->getResult();
       
    //    $query = $this->createQueryBuilder('m')
    //    ->join('m.idManga', 't')
    //    ->addSelect('m')
    //    ->addSelect('t')
    //    ->getQuery();
    //    return $query->getResult();
   }

//    /**
//     * @return TomeMangas[] Returns an array of TomeMangas objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TomeMangas
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
