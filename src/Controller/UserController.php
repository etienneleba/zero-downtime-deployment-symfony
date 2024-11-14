<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class UserController extends AbstractController
{


    public function __construct(
        private readonly UserRepository $userRepository,
    )
    {
    }

    #[Route('/users', name: 'app_user', methods: ['GET'])]
    public function index(): JsonResponse
    {
        return $this->json($this->userRepository->findAll());
    }
}
