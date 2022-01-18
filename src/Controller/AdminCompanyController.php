<?php

namespace App\Controller;

use App\Entity\Company;
use App\Entity\CompanyComment;
use App\Form\CompanyCommentType;
use App\Form\CompanyType;
use App\Form\SearchUserType;
use App\Repository\CompanyRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/admin/company")
 */
class AdminCompanyController extends AbstractController
{
    /**
     * @Route("/", name="admin_company_index", methods={"GET", "POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function index(CompanyRepository $companyRepository, Request $request): Response
    {
        $form = $this->createForm(SearchUserType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var array */
            $datas = $form->getData();

            /** @var string */
            $search = $datas['search'];

            $companies = $companyRepository->findBySiretOrName($search);
        } else {
            $companies = $companyRepository->findAllASC();
        }

        return $this->render('admin_company/index.html.twig', [
            'companies' => $companies,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_company_show", methods={"GET", "POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function show(Company $company, Request $request): Response
    {
        $comment = new CompanyComment();
        $form = $this->createForm(CompanyCommentType::class, $comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new DateTime());
            $comment->setCompany($company);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();
            $this->addFlash('success', 'Votre commentaire a été bien ajouté.');
            return $this->redirectToRoute('admin_company_index');
        }
        return $this->render('admin_company/show.html.twig', [
            'company' => $company,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_company_delete", methods={"POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Company $company, EntityManagerInterface $entityManager): Response
    {
        /** @var string */
        $token = $request->request->get('_token');
        if ($this->isCsrfTokenValid('delete' . $company->getId(), $token)) {
            $entityManager->remove($company);
            $entityManager->flush();
        }
        $this->addFlash('danger', 'L\' entreprise a bien été supprimée');

        return $this->redirectToRoute('admin_company_index', [], Response::HTTP_SEE_OTHER);
    }
}
