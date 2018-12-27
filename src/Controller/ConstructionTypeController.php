<?php

namespace App\Controller;

use App\Entity\ConstructionType;
use App\Form\ConstructionTypeType;
use App\Repository\ConstructionTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/construction/type")
 */
class ConstructionTypeController extends AbstractController
{
    /**
     * @Route("/", name="construction_type_index", methods={"GET"})
     */
    public function index(ConstructionTypeRepository $constructionTypeRepository): Response
    {
        return $this->render('construction_type/index.html.twig', ['construction_types' => $constructionTypeRepository->findAll()]);
    }

    /**
     * @Route("/new", name="construction_type_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $constructionType = new ConstructionType();
        $form = $this->createForm(ConstructionTypeType::class, $constructionType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($constructionType);
            $entityManager->flush();

            return $this->redirectToRoute('construction_type_index');
        }

        return $this->render('construction_type/new.html.twig', [
            'construction_type' => $constructionType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="construction_type_show", methods={"GET"})
     */
    public function show(ConstructionType $constructionType): Response
    {
        return $this->render('construction_type/show.html.twig', ['construction_type' => $constructionType]);
    }

    /**
     * @Route("/{id}/edit", name="construction_type_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ConstructionType $constructionType): Response
    {
        $form = $this->createForm(ConstructionTypeType::class, $constructionType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('construction_type_index', ['id' => $constructionType->getId()]);
        }

        return $this->render('construction_type/edit.html.twig', [
            'construction_type' => $constructionType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="construction_type_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ConstructionType $constructionType): Response
    {
        if ($this->isCsrfTokenValid('delete'.$constructionType->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($constructionType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('construction_type_index');
    }
}
