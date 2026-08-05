<?php

namespace App\Components\Admin\Repository;

use App\Components\Admin\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function findAllProducts(): array
    {
        return $this->createQueryBuilder('p')
            ->select(
                'p.id',
                'p.name',
                'p.type',
                'p.price',
                'p.stockQuantity',
                'p.createdAt',
                'p.updatedAt',
                'c.id AS categoryId',
                'c.name AS categoryName',
            )
            ->join('p.category', 'c')
            ->orderBy('p.id', 'ASC')
            ->getQuery()
            ->getArrayResult();
    }
}
