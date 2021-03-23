<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /*
     * @return Query
     */
    public function findAllVisibleQuery(): Query
    {
        return $this->createQueryBuilder('p')
            ->getQuery();
    }

    /*
     * @return Query
     */
    public function findVisibleEquipmentQuery(): Query
    {
        return $this->createQueryBuilder('p')
            ->where('p.State = true')
            ->andWhere('p.Type = 0')
            ->getQuery();
    }

    /*
     * @return Query
     */
    public function findVisibleClothingQuery(): Query
    {
        return $this->createQueryBuilder('p')
            ->where('p.State = true')
            ->andWhere('p.Type = 1')
            ->getQuery();
    }

    // /**
    //  * @return Product[] Returns an array of Product objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
