<?php

namespace App\Controller;

use App\Repository\HobbyRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\SoftSkillsType;

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

        return $this->render(
            'candidat/index.html.twig',
            ['candidat' => $candidat]
        );
    }

    /**
     * @Route("/profil/edit/softskills", name="sofskill_edit")
     * @IsGranted("ROLE_USER")
     */

    public function editSoftSkills(): Response
    {
        $form = $this->createForm(SoftSkillsType::class);
        return $this->render('candidat/edit/sofskills.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
