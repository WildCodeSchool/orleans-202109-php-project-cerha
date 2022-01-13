<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Form\CandidateType;
use App\Repository\CandidateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/candidate")
 */
class AdminCandidateController extends AbstractController
{
    /**
     * @Route("/", name="admin_candidate_index", methods={"GET"})
     */
    public function index(CandidateRepository $candidateRepository): Response
    {
        return $this->render('admin_candidate/index.html.twig', [
            'candidates' => $candidateRepository->findAllByName(),
        ]);
    }

    /**
     * @Route("/nouveau", name="admin_candidate_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $candidate = new Candidate();
        $form = $this->createForm(CandidateType::class, $candidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($candidate);
            $entityManager->flush();

            return $this->redirectToRoute('admin_candidate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_candidate/new.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_candidate_show", methods={"GET"})
     */
    public function show(Candidate $candidate): Response
    {
        return $this->render('admin_candidate/show.html.twig', [
            'candidate' => $candidate,
        ]);
    }

    /**
     * @Route("/{id}/modifier", name="admin_candidate_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Candidate $candidate, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CandidateType::class, $candidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_candidate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_candidate/edit.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_candidate_delete", methods={"POST"})
     */
    public function delete(Request $request, Candidate $candidate, EntityManagerInterface $entityManager): Response
    {
        /** @var string */
        $token = $request->request->get('_token');
        if ($this->isCsrfTokenValid('delete' . $candidate->getId(), $token)) {
            $entityManager->remove($candidate);
            $entityManager->flush();
        }
        $this->addFlash('danger', 'L\'utilisateur à été supprimé');
        return $this->redirectToRoute('admin_candidate_index', [], Response::HTTP_SEE_OTHER);
    }
}
