<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Employee;

class EmployeeService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function checkEmployee($email, $password)
    {
        $employeeRepository = $this->entityManager->getRepository(Employee::class);

        $employee = $employeeRepository->findOneBy(['email' => $email]);

        if ($employee) {
            return $employee;
        } else {

            return null;
        }
    }
}
