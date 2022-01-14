<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\CompanyType;
use App\Repository\CompanyRepository;
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
     * @Route("/", name="admin_company_index", methods={"GET"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function index(CompanyRepository $companyRepository): Response
    {
        return $this->render('admin_company/index.html.twig', [
            'companies' => $companyRepository->findBy([], ['denomination' => 'ASC']),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_company_show", methods={"GET"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function show(Company $company): Response
    {
        return $this->render('admin_company/show.html.twig', [
            'company' => $company,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_company_delete", methods={"POST"})
     */
    public function delete(Request $request, Company $company, EntityManagerInterface $entityManager): Response
    {
        /** @var string */
        $token = $request->request->get('_token');
        if ($this->isCsrfTokenValid('delete' . $company->getId(), $token)) {
            $entityManager->remove($company);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_company_index', [], Response::HTTP_SEE_OTHER);
    }
}
