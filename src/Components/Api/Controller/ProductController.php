<?php

namespace App\Components\Api\Controller;

use App\Components\Admin\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController extends AbstractController
{
    public function __construct(
        private readonly ProductRepository $productRepository,
    ) {
    }

    public function all(): JsonResponse
    {
        return $this->json($this->productRepository->findAllProducts());
    }
}
