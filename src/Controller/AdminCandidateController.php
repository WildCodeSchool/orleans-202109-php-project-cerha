<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Form\CandidateType;
use App\Repository\CandidateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
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
    public function index(CandidateRepository $candidateRepository, Request $request): Response
    {
        $page = (int)$request->query->get("page", '1');
        $limit = 5;

        $candidates = $candidateRepository->getPaginatedCandidates($page, $limit);
        $totalCandidates = $candidateRepository->getTotalCandidates();

        return $this->render('admin_candidate/index.html.twig', [
            'candidates' => $candidates, 'total' => $totalCandidates, 'limit' => $limit, 'page' => $page
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
     * @Route("/{id}/details", name="admin_candidate_details", methods={"GET", "POST"})
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

    /**
     * @Route("/pdf/{id<\d+>}", name="admin_candidate_pdf", methods={"GET"})
     */
    public function generateCV(Candidate $candidate): Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('chroot', __DIR__ . '/../../public/');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('admin_candidate/cvPdf.html.twig', [
            'candidate' => $candidate
        ]);
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);

        return new Response('', 200, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
