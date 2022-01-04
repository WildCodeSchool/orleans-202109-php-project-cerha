<?php

namespace App\Controller;

use Symfony\Component\Intl\Languages;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Candidat;

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
        /** @var Candidat */
        $candidat = $user->getCandidat();
        $languagesName = [];
        $candidatLanguages = $candidat->getCandidatLanguages();

        foreach ($candidatLanguages as $language) {
            $languagesName[] = ucfirst(Languages::getName($language->getName(), 'fr'));
        }

        return $this->render(
            'candidat/index.html.twig',
            ['candidat' => $candidat, 'languages' => $languagesName]
        );
    }
}
