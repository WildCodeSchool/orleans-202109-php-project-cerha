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
            'picture' => 'https://via.placeholder.com/350?text=Employee+Placeholder',
            'civility' => 'M'
        ],
        [
            'firstname' => 'Lionel',
            'lastname' => 'Dubos',
            'role' => 'rôle',
            'picture' => 'https://via.placeholder.com/350?text=Employee+Placeholder',
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
            $newEmployee->setCivility($employee['civility']);
            $manager->persist($newEmployee);
        }
        $manager->flush();
    }
}
