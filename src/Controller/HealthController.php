<?php
declare(strict_types=1);

namespace App\Controller;

use Doctrine\DBAL\Driver\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/health")]
final class HealthController
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    public function __invoke(): JsonResponse
    {
        return new JsonResponse([
            'database' => $this->checkDatabase(),
        ]);
    }

    private function checkDatabase(): bool
    {
        try {
            return $this->entityManager->getConnection()->connect();
        } catch (\Exception $exception) {
            return false;
        }
    }
}
