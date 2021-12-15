<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EmployeeFixtures extends Fixture
{
    public const EMPLOYEES = [
        [
            'name' => 'Kévin Hidalgo',
            'role' => 'rôle',
            'picture' => 'https://via.placeholder.com/250',
            'civility' => 'M'
        ],
        [
            'name' => 'Lionel Dubos',
            'role' => 'rôle',
            'picture' => 'https://via.placeholder.com/250',
            'civility' => 'M',
        ]
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::EMPLOYEES as $employee) {
            $newEmployee = new Employee();
            $newEmployee->setName($employee['name']);
            $newEmployee->setRole($employee['role']);
            $newEmployee->setPicture($employee['picture']);
            $newEmployee->setCivility($employee['civility']);
            $manager->persist($newEmployee);
        }


        $manager->flush();
    }
}
