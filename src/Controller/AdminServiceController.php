<?php

namespace App\Controller;

use App\Entity\Service;
use App\Form\ServiceType;
use App\Repository\ServiceCategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\ServiceCategory;

/**
 * @Route("/admin/service", name="admin_service_")
 * @IsGranted("ROLE_ADMIN")
 */
class AdminServiceController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(
        ServiceCategoryRepository $categoryRepository
    ): Response {
        return $this->render('admin_service/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/ajouter/{id}", name="new", methods={"GET", "POST"})
     */
    public function new(
        Request $request,
        ServiceCategory $category,
        EntityManagerInterface $entityManager
    ): Response {
        $service = new Service();
        $service->setCategory($category);
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($service);
            $entityManager->flush();

            return $this->redirectToRoute('admin_service_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_service/new.html.twig', [
            'service' => $service,
            'form' => $form,
            'category' => $category,
        ]);
    }

    /**
     * @Route("/modifier/{id}", name="edit", methods={"GET", "POST"})
     */
    public function edit(
        Request $request,
        Service $service,
        EntityManagerInterface $entityManager
    ): Response {
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_service_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_service/edit.html.twig', [
            'service' => $service,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/supprimer/{id}", name="delete", methods={"POST"})
     */
    public function delete(
        Request $request,
        Service $service,
        EntityManagerInterface $entityManager
    ): Response {
        /** @var string */
        $token = $request->request->get('_token');
        if ($this->isCsrfTokenValid('delete' . $service->getId(), $token)) {
            $entityManager->remove($service);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_service_index', [], Response::HTTP_SEE_OTHER);
    }
}
