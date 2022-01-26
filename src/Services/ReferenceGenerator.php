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
        $date = new DateTime();
        $user = $this->userRepository->findByYear();
        if (!$user) {
            return 'null';
        } else {
            return 'CER_' . str_pad((string) $this->getNumber($user), 4, '0', STR_PAD_LEFT) . '_' . $date->format('y');
        }
    }

    private function getNumber(User $user): int
    {
        /** @var string */
        $userReference = $user->getReference();
        $number = explode('_', $userReference)[1];
        /** @var int */
        $number = ltrim($number, '0');
        return $number += 1;
    }
}
