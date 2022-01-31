<?php

namespace App\Controller;

use App\Entity\ServiceCategory;
use App\Form\ServiceCategoryType;
use App\Repository\ServiceCategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/admin/service/categorie", name="admin_service_category_")
 * @IsGranted("ROLE_ADMIN")
 */
class AdminServiceCategoryController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(
        ServiceCategoryRepository $categoryRepository
    ): Response {
        return $this->render('admin_service_category/index.html.twig', [
            'service_categories' => $categoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/ajouter", name="new", methods={"GET", "POST"})
     */
    public function new(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $serviceCategory = new ServiceCategory();
        /** @var string */
        $type = $request->get('type');
        $form = $this->createForm(ServiceCategoryType::class, $serviceCategory);
        $form->handleRequest($request);
        $serviceCategory->setType($type);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($serviceCategory);
            $entityManager->flush();

            return $this->redirectToRoute('admin_service_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_service_category/new.html.twig', [
            'service_category' => $serviceCategory,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/modifier/{id}", name="edit", methods={"GET", "POST"})
     */
    public function edit(
        Request $request,
        ServiceCategory $serviceCategory,
        EntityManagerInterface $entityManager
    ): Response {
        $form = $this->createForm(ServiceCategoryType::class, $serviceCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_service_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_service_category/edit.html.twig', [
            'service_category' => $serviceCategory,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/supprimer/{id}", name="delete", methods={"POST"})
     */
    public function delete(
        Request $request,
        ServiceCategory $serviceCategory,
        EntityManagerInterface $entityManager
    ): Response {
        /** @var string */
        $token = $request->request->get('_token');
        if ($this->isCsrfTokenValid('delete' . $serviceCategory->getId(), $token)) {
            $entityManager->remove($serviceCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_service_category_index', [], Response::HTTP_SEE_OTHER);
    }
}
