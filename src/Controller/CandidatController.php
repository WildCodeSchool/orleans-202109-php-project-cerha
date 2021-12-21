<?php

namespace App\Controller;

use App\Repository\HobbyRepository;
use App\Repository\SoftSkillRepository;
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
     */
    public function show(SoftSkillRepository $softSkillRepository, HobbyRepository $hobbyRepository): Response
    {
        $softSkills = $softSkillRepository->findAll();
        $hobbies = $hobbyRepository->findAll();

        return $this->render('candidat/index.html.twig', ['softSkills' => $softSkills, 'hobbies' => $hobbies]);
    }
}
