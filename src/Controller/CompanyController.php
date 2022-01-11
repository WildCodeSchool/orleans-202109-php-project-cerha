<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Company;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CompanyDetailsType;
use App\Form\CompanyContactType;
use App\Form\CompanyNeedType;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/entreprise", name="company_")
 */

class CompanyController extends AbstractController
{
    /**
     * @Route("/profil/{id<^[0-9]+$>}", name="show")
     */
    public function showCompanyProfile(
        Company $company
    ): Response {

        return $this->render(
            'company/index.html.twig',
            ['company' => $company]
        );
    }

    /**
     * @Route("/profil/{id<^[0-9]+$>}/modifier", name="edit", methods={"GET", "POST"})
     */
    public function editCompanyContact(
        Request $request,
        Company $company,
        EntityManagerInterface $entityManager
    ): Response {
        $form = $this->createForm(CompanyContactType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('company_show', ['id' => $company->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('company/editCompanyContact.html.twig', [
            'company' => $company,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/profil/{id<^[0-9]+$>}/informations", name="editDetails", methods={"GET", "POST"})
     */
    public function editCompanyDetails(
        Request $request,
        Company $company,
        EntityManagerInterface $entityManager
    ): Response {
        $form = $this->createForm(CompanyDetailsType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('company_show', ['id' => $company->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('company/editCompanyDetails.html.twig', [
            'company' => $company,
            'form' => $form,
        ]);
    }
    /**
     * @Route("/profil/{id<^[0-9]+$>}/besoin", name="editNeed", methods={"GET", "POST"})
     */
    public function editCompanyNeed(
        Request $request,
        Company $company,
        EntityManagerInterface $entityManager
    ): Response {
        $form = $this->createForm(CompanyNeedType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('company_show', ['id' => $company->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('company/editCompanyNeed.html.twig', [
            'company' => $company,
            'form' => $form,
        ]);
    }
}
