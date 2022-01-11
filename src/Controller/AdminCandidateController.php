<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Form\CandidatType;
use App\Repository\CandidatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/candidat")
 */
class AdminCandidateController extends AbstractController
{
    /**
     * @Route("/", name="admin_candidate_index", methods={"GET"})
     */
    public function index(CandidatRepository $candidatRepository): Response
    {
        return $this->render('admin_candidate/index.html.twig', [
            'candidats' => $candidatRepository->findAllByName(),
        ]);
    }

    /**
     * @Route("/nouveau", name="admin_candidate_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $candidat = new Candidat();
        $form = $this->createForm(CandidatType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($candidat);
            $entityManager->flush();

            return $this->redirectToRoute('admin_candidate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_candidate/new.html.twig', [
            'candidat' => $candidat,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_candidate_show", methods={"GET"})
     */
    public function show(Candidat $candidat): Response
    {
        return $this->render('admin_candidate/show.html.twig', [
            'candidat' => $candidat,
        ]);
    }

    /**
     * @Route("/{id}/modifier", name="admin_candidate_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Candidat $candidat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CandidatType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_candidate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_candidate/edit.html.twig', [
            'candidat' => $candidat,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_candidate_delete", methods={"POST"})
     */
    public function delete(Request $request, Candidat $candidat, EntityManagerInterface $entityManager): Response
    {
        /** @var string */
        $token = $request->request->get('_token');
        if ($this->isCsrfTokenValid('delete' . $candidat->getId(), $token)) {
            $entityManager->remove($candidat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_candidate_index', [], Response::HTTP_SEE_OTHER);
    }
}
