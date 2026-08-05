<?php

namespace App\Components\Api\Controller;

use App\Components\Admin\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryController extends AbstractController
{
    public function __construct(
        private readonly CategoryRepository $categoryRepository,
    ) {
    }

    public function all(): JsonResponse
    {
        return $this->json($this->categoryRepository->findAllCategories());
    }
}
