<?php

namespace App\Controller;

use App\Entity\Property;
use App\Form\PropertySearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(PropertySearchType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $searchQuery = $form->getData();
            dump($searchQuery);

            $propertyRepository = $this->getDoctrine()->getRepository(Property::class);
            $searchResults = $propertyRepository->fetchSearchResults($searchQuery);

            return $this->render('search/results.html.twig', [
                'controller_name'   => 'SearchController',
                'search_form'       => $form->createView(),
                'searchResults'     => $searchResults
            ]);
        }

        return $this->render('search/index.html.twig', [
            'controller_name'   => 'SearchController',
            'search_form'       => $form->createView()
        ]);
    }
}
