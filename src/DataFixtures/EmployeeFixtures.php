<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EmployeeFixtures extends Fixture
{
    public const EMPLOYEES = [
        [
            'firstname' => 'Kevin',
            'lastname' => 'Hidalgo',
            'role' => 'Co-fondateur - Responsable RH',
            'civility' => 'M.',
            'picture' => 'kevin.jpg'
        ],
        [
            'firstname' => 'Lionel',
            'lastname' => 'Dubos',
            'role' => 'Co-fondateur - Responsable Financement',
            'civility' => 'M.',
            'picture' => 'lionel.jpg'
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
            copy(
                __DIR__ . '/' . $employee['picture'],
                __DIR__ . '/../../public/uploads/employee/' . $employee['picture']
            );
            $newEmployee->setCivility($employee['civility']);
            $manager->persist($newEmployee);
        }
        $manager->flush();
    }
}
