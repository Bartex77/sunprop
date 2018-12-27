<?php

namespace App\Controller;

use App\Entity\SeaDistanceUnit;
use App\Form\SeaDistanceUnitType;
use App\Repository\SeaDistanceUnitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sea/distance/unit")
 */
class SeaDistanceUnitController extends AbstractController
{
    /**
     * @Route("/", name="sea_distance_unit_index", methods={"GET"})
     */
    public function index(SeaDistanceUnitRepository $seaDistanceUnitRepository): Response
    {
        return $this->render('sea_distance_unit/index.html.twig', ['sea_distance_units' => $seaDistanceUnitRepository->findAll()]);
    }

    /**
     * @Route("/new", name="sea_distance_unit_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $seaDistanceUnit = new SeaDistanceUnit();
        $form = $this->createForm(SeaDistanceUnitType::class, $seaDistanceUnit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($seaDistanceUnit);
            $entityManager->flush();

            return $this->redirectToRoute('sea_distance_unit_index');
        }

        return $this->render('sea_distance_unit/new.html.twig', [
            'sea_distance_unit' => $seaDistanceUnit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sea_distance_unit_show", methods={"GET"})
     */
    public function show(SeaDistanceUnit $seaDistanceUnit): Response
    {
        return $this->render('sea_distance_unit/show.html.twig', ['sea_distance_unit' => $seaDistanceUnit]);
    }

    /**
     * @Route("/{id}/edit", name="sea_distance_unit_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SeaDistanceUnit $seaDistanceUnit): Response
    {
        $form = $this->createForm(SeaDistanceUnitType::class, $seaDistanceUnit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sea_distance_unit_index', ['id' => $seaDistanceUnit->getId()]);
        }

        return $this->render('sea_distance_unit/edit.html.twig', [
            'sea_distance_unit' => $seaDistanceUnit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sea_distance_unit_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SeaDistanceUnit $seaDistanceUnit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$seaDistanceUnit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($seaDistanceUnit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sea_distance_unit_index');
    }
}
