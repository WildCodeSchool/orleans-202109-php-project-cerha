<?php

namespace App\Controller;

use App\Repository\EmployeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    /**
     * @Route("/a-propos", name="about")
     */
    public function index(EmployeeRepository $employeeRepository): Response
    {
        return $this->render('about/index.html.twig', ['employees' => $employeeRepository->findAll()]);
    }
}
