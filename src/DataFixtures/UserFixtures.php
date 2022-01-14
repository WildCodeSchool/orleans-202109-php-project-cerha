<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public const USER_NUMBER = 20;
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < self::USER_NUMBER; $i++) {
            $user = new User();
            $user->setLastname($faker->lastName());
            $user->setFirstname($faker->firstName());
            $user->setEmail($faker->email());
            $user->setPhoneNumber((int)$faker->serviceNumber());
            $user->setPassword($this->passwordHasher->hashPassword($user, 'test'));
            $user->setGender('M');
            $manager->persist($user);
            $this->addReference('user_' . $i, $user);
            if ($i >= CandidatFixtures::CANDIDAT_NUMBER) {
                $user->setRoles(['ROLE_CANDIDATE']);
            } else {
                $user->setRoles(['ROLE_COMPANY']);
            }
        }

        $user = new User();
        $user->setLastname('John');
        $user->setFirstname('Doe');
        $user->setEmail('john@doe.com');
        $user->setPhoneNumber('0601010101');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'admin'));
        $user->setGender('M');
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);
        $this->addReference('user_john', $user);

        $user = new User();
        $user->setLastname('Blondeau');
        $user->setFirstname('Sylvain');
        $user->setEmail('sylvain@blondeau.com');
        $user->setPhoneNumber('0666666666');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'bilbo'));
        $user->setGender('M');
        $user->setRoles(['ROLE_CANDIDATE']);
        $manager->persist($user);
        $this->addReference('user_sylvain', $user);

        $user = new User();
        $user->setLastname('Falques');
        $user->setFirstname('Fabrice');
        $user->setEmail('fabrice@falques.com');
        $user->setPhoneNumber('0606060606');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'bigmac'));
        $user->setGender('M');
        $user->setRoles(['ROLE_COMPANY']);
        $manager->persist($user);
        $this->addReference('user_fabrice', $user);

        $manager->flush();
    }
}
