<?php

namespace App\Controller;

use App\Entity\Property;
use App\Form\PropertySearchSaleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchSaleController extends AbstractController
{
    /**
     * @Route("/searchSale", name="searchSale")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(PropertySearchSaleType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $searchQuery = $form->getData();
            dump($searchQuery);

            $propertyRepository = $this->getDoctrine()->getRepository(Property::class);
            $searchResults = $propertyRepository->fetchSearchResults($searchQuery);

            return $this->render('search/resultsSale.html.twig', [
                'controller_name'   => 'SearchSaleController',
                'search_form'       => $form->createView(),
                'searchResults'     => $searchResults
            ]);
        }

        return $this->render('search/index.html.twig', [
            'controller_name'   => 'SearchSaleController',
            'search_form'       => $form->createView()
        ]);
    }
}
