<?php

namespace App\Repository\Manga;

use App\Entity\Manga\Tome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tome>
 *
 * @method Tome|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tome|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tome[]    findAll()
 * @method Tome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tome::class);
    }

    public function save(Tome $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Tome $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Returns the last 6 volumes added to the site
     * @return array
     */
    public function getLastTomeMangas(): array
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.createdAt', 'DESC')
            ->innerJoin('a.idManga', 'c')
            ->setMaxResults(6)
            ->getQuery()
            ->getResult();

    }

//    /**
//     * @return Tome[] Returns an array of Tome objects
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

//    public function findOneBySomeField($value): ?Tome
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
