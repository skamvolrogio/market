<?php

namespace App\Components\Api\Controller;

use App\Components\Admin\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController extends AbstractController
{
    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function all(): JsonResponse
    {
        $products = $this->productRepository->findAllProducts();

        return $this->json([
            'products' => $products
        ]);
    }
}
