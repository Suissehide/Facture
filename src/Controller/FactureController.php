<?php

namespace App\Controller;

use App\Entity\Facture;
use App\Form\FactureType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class FactureController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request)
    {
        return $this->render('facture/index.html.twig', [
            'controller_name' => 'FactureController',
        ]);
    }

    /**
     * @Route("/facture", name="new_facture")
     */
    public function new(Request $request)
    {
        $facture = new Facture();
        $form = $this->createForm(FactureType::class, $facture);
        $em = $this->getDoctrine()->getManager();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('save')->isClicked()) {
                $facture = $form->getData();
                $em->flush();
            }
            return $this->redirect($request->getUri());
        }

        return $this->render('facture/edit.html.twig', [
            'controller_name' => 'FactureController',
            'form' => $form->createView(),
        ]);
    }

        /**
     * @Route("/facture/{id}", name="edit_facture")
     */
    public function edit(Request $request, Facture $facture)
    {
        $form = $this->createForm(FactureType::class, $facture);
        $em = $this->getDoctrine()->getManager();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('save')->isClicked()) {
                $facture = $form->getData();
                $em->flush();
            }
            return $this->redirect($request->getUri());
        }

        return $this->render('facture/edit.html.twig', [
            'controller_name' => 'FactureController',
            'form' => $form->createView(),
        ]);
    }
}
