<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CompanyDetailsType;
use App\Form\CompanyContactType;
use App\Form\CompanyNeedType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\User;

/**
 * @Route("/entreprise", name="company_")
 */

class CompanyController extends AbstractController
{
    /**
     * @Route("/profil", name="show")
     *  * @IsGranted("ROLE_COMPANY")
     */
    public function showCompanyProfile(): Response
    {

        /** @var User */
        $user = $this->getUser();
        $company = $user->getCompany();
        return $this->render(
            'company/index.html.twig',
            ['company' => $company]
        );
    }

    /**
     * @Route("/profil/contact/modifier", name="editContact", methods={"GET", "POST"})
     * @IsGranted("ROLE_COMPANY")
     */
    public function editCompanyContact(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {

        /** @var User */
        $user = $this->getUser();
        $company = $user->getCompany();

        $form = $this->createForm(CompanyContactType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Votre modification a été bien enregistrée.');

            return $this->redirectToRoute('company_show');
        }

        return $this->renderForm('company/editCompanyContact.html.twig', [
            'company' => $company,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/profil/informations/modifier", name="editDetails", methods={"GET", "POST"})
     * @IsGranted("ROLE_COMPANY")
     */
    public function editCompanyDetails(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {

        /** @var User */
        $user = $this->getUser();
        $company = $user->getCompany();

        $form = $this->createForm(CompanyDetailsType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Votre modification a été bien enregistrée.');

            return $this->redirectToRoute('company_show');
        }

        return $this->renderForm('company/editCompanyDetails.html.twig', [
            'company' => $company,
            'form' => $form,
        ]);
    }
    /**
     * @Route("/profil/besoin/modifier", name="editNeed", methods={"GET", "POST"})
     * @IsGranted("ROLE_COMPANY")
     */
    public function editCompanyNeed(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {

        /** @var User */
        $user = $this->getUser();
        $company = $user->getCompany();

        $form = $this->createForm(CompanyNeedType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Votre modification a été bien enregistrée.');

            return $this->redirectToRoute('company_show');
        }

        return $this->renderForm('company/editCompanyNeed.html.twig', [
            'company' => $company,
            'form' => $form,
        ]);
    }
}
