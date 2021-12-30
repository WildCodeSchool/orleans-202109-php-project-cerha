<?php

namespace App\Controller;

use App\Entity\Candidat;
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
     * @Route("/profil/{id<^[0-9]+$>}", name="show")
     * @IsGranted("ROLE_USER")
     */

    public function showCandidateProfile(Candidat $candidat): Response
    {
        return $this->render(
            'candidat/index.html.twig',
            ['candidat' => $candidat]
        );
    }
}
