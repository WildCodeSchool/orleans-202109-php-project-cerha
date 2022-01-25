<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EmployeeFixtures extends Fixture
{
    public const EMPLOYEES = [
        [
            'firstname' => 'Kévin',
            'lastname' => 'Hidalgo',
            'role' => 'rôle',
            'picture' => 'placeholder.png',
            'civility' => 'M'
        ],
        [
            'firstname' => 'Lionel',
            'lastname' => 'Dubos',
            'role' => 'rôle',
            'picture' => 'placeholder.png',
            'civility' => 'M',
        ]
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::EMPLOYEES as $employee) {
            $newEmployee = new Employee();
            $newEmployee->setFirstname($employee['firstname']);
            $newEmployee->setLastname($employee['lastname']);
            $newEmployee->setRole($employee['role']);
            $newEmployee->setPicture($employee['picture']);
            copy(__DIR__ . '/placeholder.png', __DIR__ . '/../../public/uploads/employee/placeholder.png');
            $newEmployee->setCivility($employee['civility']);
            $manager->persist($newEmployee);
        }
        $manager->flush();
    }
}
