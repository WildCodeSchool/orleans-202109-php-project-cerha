<?php

namespace App\Controller;

use App\Form\ContactDetailsType;
use App\Entity\Candidat;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
    public function showCandidateProfile(Candidat $candidat ,SoftSkillRepository $softSkillRepository): Response
    {
      
      $softSkills = $softSkillRepository->findAll();        
      
      return $this->render('candidat/index.html.twig', ['candidat' => $candidat ,'softSkills' => $softSkills]);
    }


    /**
     * @Route("/profil/{id}/modifier", name="edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Candidat $candidat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContactDetailsType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Votre modification a été bien enregistrée.');
        }

        return $this->renderForm('candidat/form/edit.contactDetails.html.twig', [
            'candidat' => $candidat,
            'form' => $form,
        ]);
    }

   
}
