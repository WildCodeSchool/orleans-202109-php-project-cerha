<?php

namespace App\Services;

use App\Repository\UserRepository;
use App\Entity\User;
use DateTime;

class ReferenceGenerator
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function generateReference(): string
    {
        $lastUser = $this->userRepository->findByYear();
        if (!$lastUser) {
            $number = 1;
        } else {
            $number = $this->getNumber($lastUser);
        }
        return $this->getNewReference($number);
    }

    private function getNumber(User $user): int
    {
        /** @var string */
        $userReference = $user->getReference();
        $number = explode('_', $userReference)[1];
        /** @var int */
        $number = ltrim($number, '0');
        return $number;
    }

    public function getNewReference(int $number): string
    {
        $date = new DateTime();
        $number++;
        return 'CER_' . str_pad((string)$number, 4, '0', STR_PAD_LEFT) . '_' . $date->format('y');
    }
}
