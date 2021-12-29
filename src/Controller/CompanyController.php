<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Company;

/**
 * @Route("/company", name="company_")
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
}
