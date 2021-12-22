<?php

namespace App\Controller;

use App\Entity\Candidat;
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
     * @Route("/profil/{id<^[0-9]+$>}", name="show")
     */

    public function showCandidateProfile(Candidat $candidat, SoftSkillRepository $softSkillRepository, HobbyRepository $hobbyRepository): Response

    {
        $softSkills = $softSkillRepository->findAll();
        $hobbies = $hobbyRepository->findAll();
      
        return $this->render('candidat/index.html.twig', ['candidat' => $candidat, 'softSkills' => $softSkills, 'hobbies' => $hobbies]);

    }
}
