<?php

namespace App\Controller;

use App\Entity\Propertytype;
use App\Form\PropertytypeType;
use App\Repository\PropertytypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/propertytype")
 */
class PropertytypeController extends AbstractController
{
    /**
     * @Route("/", name="type_index", methods={"GET"})
     */
    public function index(PropertytypeRepository $typeRepository): Response
    {
        return $this->render('propertytype/index.html.twig', ['types' => $typeRepository->findAll()]);
    }

    /**
     * @Route("/new", name="type_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $type = new Propertytype();
        $form = $this->createForm(PropertytypeType::class, $type);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($type);
            $entityManager->flush();

            return $this->redirectToRoute('type_index');
        }

        return $this->render('propertytype/new.html.twig', [
            'propertytype' => $type,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_show", methods={"GET"})
     */
    public function show(Propertytype $type): Response
    {
        return $this->render('propertytype/show.html.twig', ['propertytype' => $type]);
    }

    /**
     * @Route("/{id}/edit", name="type_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Propertytype $type): Response
    {
        $form = $this->createForm(PropertytypeType::class, $type);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_index', ['id' => $type->getId()]);
        }

        return $this->render('propertytype/edit.html.twig', [
            'propertytype' => $type,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Propertytype $type): Response
    {
        if ($this->isCsrfTokenValid('delete'.$type->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($type);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_index');
    }
}
