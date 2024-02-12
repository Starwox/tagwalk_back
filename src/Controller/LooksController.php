<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Looks;

class LooksController extends AbstractController
{
    #[Route('/looks', name: 'app_looks', methods: ['GET'])]
    public function getLooks(EntityManagerInterface $em): JsonResponse
    {
        $looks = $em->getRepository(Looks::class)->findAll();
        
        return $this->json(
            $looks, 
            JsonResponse::HTTP_OK, 
            ['Content-Type' => 'application/json'], 
            ['groups' => 'look:read']
        );
    }
}
