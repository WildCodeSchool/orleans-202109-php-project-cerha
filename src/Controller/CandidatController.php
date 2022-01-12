<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Form\CandidateSkillsType;
use App\Repository\HobbyRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ContactDetailsType;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use App\Form\CandidateFormationsType;
use App\Form\HobbiesType;
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
     * @Route("/profil/edit/softskills", name="softskill_edit")
     * @IsGranted("ROLE_USER")
     */

    public function editSoftSkills(Request $request): Response
    {

        /** @var User */
        $user = $this->getUser();
        $candidat = $user->getCandidat();

        $form = $this->createForm(SoftSkillsType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->flush();
            $this->addFlash('success', 'Votre modification a été bien enregistrée.');

            return $this->redirectToRoute('candidat_show');
        }
        return $this->render('candidat/edit/sofskills.html.twig', [
            'form' => $form->createView(), 'candidat' => $candidat
        ]);
    }

    /**
     * @Route("/profil/modifier", name="edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, EntityManagerInterface $entityManager): Response
    {
        /** @var User */
        $user = $this->getUser();
        $candidat = $user->getCandidat();
        $form = $this->createForm(ContactDetailsType::class, $candidat);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Votre modification a été bien enregistrée.');
        }

        return $this->renderForm('candidat/edit/edit.contactDetails.html.twig', [
            'candidat' => $candidat,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/profil/edit/hobbies", name="hobby_edit")
     * @IsGranted("ROLE_USER")
     */

    public function editHobbies(Request $request): Response
    {

        /** @var User */
        $user = $this->getUser();
        $candidat = $user->getCandidat();

        $form = $this->createForm(HobbiesType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->flush();
            $this->addFlash('success', 'Votre modification a été bien enregistrée.');

            return $this->redirectToRoute('candidat_show');
        }
        return $this->render('candidat/edit/hobbies.html.twig', [
            'form' => $form->createView(), 'candidat' => $candidat
        ]);
    }

    /**
     * @Route("/profil/modifier/skill", name="edit_skill", methods={"GET", "POST"})
     */
    public function editSkill(Request $request, EntityManagerInterface $entityManager): Response
    {
        /** @var User */
        $user = $this->getUser();
        $candidate = $user->getCandidat();
        $form = $this->createForm(CandidateSkillsType::class, $candidate);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Votre modification a été bien enregistrée.');
        }
        return $this->renderForm('candidat/edit/edit.skill.html.twig', [
            'candidat' => $candidate,
            'form' => $form,
        ]);
    }
    /**
     * @Route("/profil/modifier/formation", name="edit_formation", methods={"GET", "POST"})
     */
    public function editFormation(Request $request, EntityManagerInterface $entityManager): Response
    {
        /** @var User */
        $user = $this->getUser();
        $candidate = $user->getCandidat();
        $form = $this->createForm(CandidateFormationsType::class, $candidate);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Votre modification a été bien enregistrée.');
        }
        return $this->renderForm('candidat/edit/edit.formation.html.twig', [
            'candidat' => $candidate,
            'form' => $form,
        ]);
    }
}
