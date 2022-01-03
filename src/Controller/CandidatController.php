<?php

namespace App\Controller;

use App\Repository\HobbyRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/candidat", name="candidat_")
 */

class CandidatController extends AbstractController
{
    /**
     * @Route("/profil", name="show")
     * @IsGranted("ROLE_USER")
     */

    public function showCandidateProfile(
        HobbyRepository $hobbyRepository
    ): Response {
        $hobbies = $hobbyRepository->findAll();
        $candidat = $this->getUser()->getCandidat();
        return $this->render(
            'candidat/index.html.twig',
            ['candidat' => $candidat, 'hobbies' => $hobbies]
        );
    }
}
