<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ServiceRepository;

class ServiceController extends AbstractController
{
    /**
     * @Route("/services", name="services")
     */
    public function index(ServiceRepository $serviceRepository): Response
    {
        return $this->render('services/index.html.twig', ['services' => $serviceRepository->findAll()]);
    }
}
