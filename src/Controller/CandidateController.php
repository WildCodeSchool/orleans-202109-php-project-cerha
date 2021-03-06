<?php

namespace App\Controller;

use App\Entity\AdditionalDocument;
use App\Entity\Skill;
use App\Entity\Candidate;
use App\Entity\CandidateLanguage;
use App\Entity\Experience;
use App\Entity\Formation;
use App\Entity\Hobby;
use App\Entity\SoftSkill;
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
use App\Form\CandidateDocumentType;
use App\Form\CandidateLanguagesType;
use App\Form\ComplementaryQuestionType;
use App\Form\CandidateExperienceType;
use App\Form\CandidateFormationsType;
use App\Form\HobbiesType;
use App\Form\SoftSkillsType;

/**
 * @Route("/candidat", name="candidate_")
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */

class CandidateController extends AbstractController
{
    /**
     * @Route("/profil", name="show")
     * @IsGranted("ROLE_USER")
     */
    public function showCandidateProfile(): Response
    {
        /** @var User */
        $user = $this->getUser();
        $candidate = $user->getCandidate();

        return $this->render(
            'candidate/index.html.twig',
            ['candidate' => $candidate]
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
        /** @var Candidate */
        $candidate = $user->getCandidate();
        if ($candidate->getSoftSkills()->isEmpty()) {
            $softSkill = new SoftSkill();
            $candidate->addSoftSkill($softSkill);
        }
        $form = $this->createForm(SoftSkillsType::class, $candidate);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->flush();
            $this->addFlash('success', 'Votre modification a ??t?? bien enregistr??e.');

            return $this->redirectToRoute('candidate_show');
        }

        return $this->render('candidate/edit/sofskills.html.twig', [
            'form' => $form->createView(), 'candidate' => $candidate
        ]);
    }

    /**
     * @Route("/profil/modifier", name="edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, EntityManagerInterface $entityManager): Response
    {
        /** @var User */
        $user = $this->getUser();
        /** @var Candidate */
        $candidate = $user->getCandidate();
        $form = $this->createForm(ContactDetailsType::class, $candidate);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Votre modification a ??t?? bien enregistr??e.');

            return $this->redirectToRoute('candidate_show');
        }

        return $this->renderForm('candidate/edit/edit.contactDetails.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/profil/{reference}", name="show_public_profile")
     * @IsGranted("ROLE_COMPANY")
     */
    public function showPublicProfile(User $user, Candidate $candidate): Response
    {

        return $this->render(
            'candidate/public-profile.html.twig',
            ['candidate' => $candidate]
        );
    }

    /**
     * @Route("/profil/modifier/questions-complementaires", name="questions_edit", methods={"GET", "POST"})
     */
    public function editQuestions(Request $request, EntityManagerInterface $entityManager): Response
    {
        /** @var User */
        $user = $this->getUser();
        $candidate = $user->getCandidate();
        $form = $this->createForm(ComplementaryQuestionType::class, $candidate);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
            $this->addFlash('success', 'Votre modification a ??t?? bien enregistr??e.');

            return $this->redirectToRoute('candidate_show');
        }

        return $this->renderForm('candidate/edit/complementary-questions.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/profil/edit/hobbies", name="hobbies_edit")
     * @IsGranted("ROLE_USER")
     */
    public function editHobbies(Request $request): Response
    {
        /** @var User */
        $user = $this->getUser();
        /** @var Candidate */
        $candidate = $user->getCandidate();
        if ($candidate->getHobbies()->isEmpty()) {
            $hobbies = new Hobby();
            $candidate->addHobby($hobbies);
        }
        $form = $this->createForm(HobbiesType::class, $candidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
            $this->addFlash('success', 'Votre modification a ??t?? bien enregistr??e.');

            return $this->redirectToRoute('candidate_show');
        }

        return $this->render('candidate/edit/hobbies.html.twig', [
            'form' => $form->createView(), 'candidate' => $candidate
        ]);
    }

    /**
     * @Route("/profil/modifier/skill", name="edit_skill", methods={"GET", "POST"})
     */
    public function editSkill(Request $request, EntityManagerInterface $entityManager): Response
    {
        /** @var User */
        $user = $this->getUser();
        /** @var Candidate */
        $candidate = $user->getCandidate();
        if ($candidate->getSkills()->isEmpty()) {
            $skill = new Skill();
            $candidate->addSkill($skill);
        }
        $form = $this->createForm(CandidateSkillsType::class, $candidate);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Votre modification a ??t?? bien enregistr??e.');

            return $this->redirectToRoute('candidate_show');
        }

        return $this->renderForm('candidate/edit/edit.skill.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/profil/modifier/langues", name="edit_languages", methods={"GET", "POST"})
     */
    public function editLanguages(Request $request, EntityManagerInterface $entityManager): Response
    {
        /** @var User */
        $user = $this->getUser();
        /** @var Candidate */
        $candidate = $user->getCandidate();
        if ($candidate->getCandidateLanguages()->isEmpty()) {
            $language = new CandidateLanguage();
            $candidate->addCandidateLanguage($language);
        }
        $form = $this->createForm(CandidateLanguagesType::class, $candidate);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Votre modification a ??t?? bien enregistr??e.');

            return $this->redirectToRoute('candidate_show');
        }

        return $this->renderForm('candidate/edit/languages.html.twig', [
            'candidate' => $candidate,
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
        /** @var Candidate */
        $candidate = $user->getCandidate();
        if ($candidate->getFormations()->isEmpty()) {
            $formation = new Formation();
            $candidate->addFormation($formation);
        }
        $form = $this->createForm(CandidateFormationsType::class, $candidate);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Votre modification a ??t?? bien enregistr??e.');

            return $this->redirectToRoute('candidate_show');
        }

        return $this->renderForm('candidate/edit/edit.formation.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/profil/modifier/experience", name="edit_experience", methods={"GET", "POST"})
     */
    public function editExperience(Request $request, EntityManagerInterface $entityManager): Response
    {
        /** @var User */
        $user = $this->getUser();
        /** @var Candidate */
        $candidate = $user->getCandidate();
        if ($candidate->getExperiences()->isEmpty()) {
            $experience = new Experience();
            $candidate->addExperience($experience);
        }
        $form = $this->createForm(CandidateExperienceType::class, $candidate);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Votre modification a ??t?? bien enregistr??e.');
            return $this->redirectToRoute('candidate_show');
        }
        return $this->renderForm('candidate/edit/edit.experience.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/profil/modifier/document", name="edit_document", methods={"GET", "POST"})
     */
    public function editDocument(Request $request, EntityManagerInterface $entityManager): Response
    {
        /** @var User */
        $user = $this->getUser();
        /** @var Candidate */
        $candidate = $user->getCandidate();
        if ($candidate->getAdditionalDocuments()->isEmpty()) {
            $document = new AdditionalDocument();
            $candidate->addAdditionalDocument($document);
        }
        $form = $this->createForm(CandidateDocumentType::class, $candidate);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Votre modification a ??t?? bien enregistr??e.');
            return $this->redirectToRoute('candidate_show');
        }
        return $this->renderForm('candidate/edit/edit.document.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }
}
