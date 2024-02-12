<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Services\EmployeeService;
use Symfony\Component\HttpFoundation\Request;


class EmployeeController extends AbstractController
{
    #[Route('/login', name: 'app_login', methods: ['POST'])]
    public function login(EntityManagerInterface $em, EmployeeService $employeeService, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $username = $data['email'] ?? '';
        $password = $data['password'] ?? '';

        $checkLogin = $employeeService->checkEmployee($username, $password);

        if (null !== $checkLogin) {
            return $this->json(
                [
                    $checkLogin->getEmail(),
                    $checkLogin->getBrand()
                ],
                JsonResponse::HTTP_OK, 
                ['Content-Type' => 'application/json']
            );
        } else {
            return $this->json(
                ['message' => $checkLogin], 
                JsonResponse::HTTP_UNAUTHORIZED, 
                ['Content-Type' => 'application/json']
            );
        }
    }
}
