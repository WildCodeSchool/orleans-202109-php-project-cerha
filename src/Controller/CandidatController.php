<?php

namespace App\Controller;

use Symfony\Component\Intl\Languages;
use App\Repository\HobbyRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

/**
 * @Route("/candidat", name="candidat_")
 */

class CandidatController extends AbstractController
{
    /**
     * @Route("/profil", name="show")
     * @IsGranted("ROLE_USER")
     */
    public function showCandidateProfile(): Response
    {
        /** @var User */
        $user = $this->getUser();
        $candidat = $user->getCandidat();
        $candidatlanguages = $candidat->getCandidatLanguages();

        $languages[]= Languages::getNames();
        

        return $this->render(
            'candidat/index.html.twig',
            ['candidat' => $candidat]
        );
    }
}
