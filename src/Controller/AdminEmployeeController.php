<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Form\EmployeeType;
use App\Repository\EmployeeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/admin/membres")
 */
class AdminEmployeeController extends AbstractController
{
    /**
     * @Route("/", name="admin_employee_index", methods={"GET"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function index(EmployeeRepository $employeeRepository): Response
    {
        return $this->render('admin_employee/index.html.twig', [
            'employees' => $employeeRepository->findAllByName(),
        ]);
    }

    /**
     * @Route("/ajouter", name="admin_employee_new", methods={"GET", "POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $employee = new Employee();
        $form = $this->createForm(EmployeeType::class, $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($employee);
            $entityManager->flush();

            return $this->redirectToRoute('admin_employee_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_employee/new.html.twig', [
            'employee' => $employee,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_employee_show", methods={"GET"})
     */
    public function show(Employee $employee): Response
    {
        return $this->render('admin_employee/show.html.twig', [
            'employee' => $employee,
        ]);
    }

    /**
     * @Route("/{id}/modifier", name="admin_employee_edit", methods={"GET", "POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function edit(Request $request, Employee $employee, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EmployeeType::class, $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_employee_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_employee/edit.html.twig', [
            'employee' => $employee,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_employee_delete", methods={"POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Employee $employee, EntityManagerInterface $entityManager): Response
    {
        /** @var string */
        $token = $request->request->get('_token');
        if ($this->isCsrfTokenValid('delete' . $employee->getId(), $token)) {
            $entityManager->remove($employee);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_employee_index', [], Response::HTTP_SEE_OTHER);
    }
}
