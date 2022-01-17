<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Entity\CandidateComment;
use App\Form\CandidateCommentType;
use App\Form\CandidateType;
use App\Repository\CandidateRepository;
use DateTime;
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
    public function index(CandidateRepository $candidateRepository): Response
    {
        return $this->render('admin_candidate/index.html.twig', [
            'candidates' => $candidateRepository->findAllByName(),
        ]);
    }


    /**
     * @Route("/{id}", name="admin_candidate_show", methods={"GET", "POST"})
     */
    public function show(Candidate $candidate, Request $request): Response
    {
        $comment = new CandidateComment();
        $form = $this->createForm(CandidateCommentType::class, $comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new DateTime());
            $comment->setCandidate($candidate);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();
            $this->addFlash('success', 'Votre commentaire a été bien ajouté.');
            return $this->redirectToRoute('admin_candidate_index');
        }


        return $this->render('admin_candidate/show.html.twig', [
            'candidate' => $candidate,
            'form' => $form->createView(),
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
