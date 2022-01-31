<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Services\ReferenceGenerator;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Validator\Constraints\Date;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;
    private ReferenceGenerator $referenceGenerator;
    public function __construct(UserPasswordHasherInterface $passwordHasher, ReferenceGenerator $referenceGenerator)
    {
        $this->passwordHasher = $passwordHasher;
        $this->referenceGenerator = $referenceGenerator;
    }
    public const USER_NUMBER = 10;
    public function load(ObjectManager $manager): void
    {
        $countUsers = 0;
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < self::USER_NUMBER; $i++) {
            $user = new User();
            $user->setLastname($faker->lastName());
            $user->setFirstname($faker->firstName());
            $user->setEmail($faker->email());
            $user->setPhoneNumber((int)$faker->serviceNumber());
            $user->setPassword($this->passwordHasher->hashPassword($user, 'test'));
            $user->setGender('M');
            $user->setCreatedAt(new DateTime('now'));
            /* TODO : replace by the reference who will be generate in the Service Reference generator */
            $user->setReference(
                'CER_' . str_pad($countUsers + 1, 4, '0', STR_PAD_LEFT) . '_' . $user->getCreatedAt()->format('y')
            );
            $user->setGender('M.');
            $manager->persist($user);
            $this->addReference('user_' . $i, $user);
            if ($i >= CandidateFixtures::CANDIDATE_NUMBER) {
                $user->setRoles(['ROLE_COMPANY']);
            } else {
                $user->setRoles(['ROLE_CANDIDATE']);
            }
            $countUsers++;
        }

        $user = new User();
        $user->setLastname('John');
        $user->setFirstname('Doe');
        $user->setEmail('john@doe.com');
        $user->setPhoneNumber('0601010101');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'admin'));
        $user->setGender('M');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setCreatedAt(new DateTime('now'));
        $user->setReference(
            'CER_' . str_pad($countUsers + 1, 4, '0', STR_PAD_LEFT) . '_' . $user->getCreatedAt()->format('y')
        );
        $countUsers++;
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
        $user->setCreatedAt(new DateTime('now'));
        $user->setReference(
            'CER_' . str_pad($countUsers + 1, 4, '0', STR_PAD_LEFT) . '_' . $user->getCreatedAt()->format('y')
        );
        $countUsers++;
        $manager->persist($user);
        $this->addReference('user_sylvain', $user);

        $user = new User();
        $user->setLastname('Smith');
        $user->setFirstname('Will');
        $user->setEmail('will@smith.com');
        $user->setPhoneNumber('0606060606');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'bigmac'));
        $user->setGender('M');
        $user->setRoles(['ROLE_COMPANY']);
        $user->setCreatedAt(new DateTime('now'));
        $user->setReference(
            'CER_' . str_pad($countUsers + 1, 4, '0', STR_PAD_LEFT) . '_' . $user->getCreatedAt()->format('y')
        );
        $countUsers++;
        $manager->persist($user);
        $this->addReference('user_will', $user);

        $manager->flush();
    }
}
