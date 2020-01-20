<?php

namespace App\Controller;

use App\Entity\Facture;
use App\Form\FactureType;
use App\Repository\FactureRepository;
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

    public static function dateToFrench($date, $format) 
    {
        $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
        $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
        return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
    }

    /**
     * @Route("/ajax/facture", name="ajax_facture")
     */
    public function ajax_facture(Request $request, FactureRepository $factureRepository)
    {
        if ($request->isXmlHttpRequest()) {
            $current = $request->request->get('current');
            $rowCount = $request->request->get('rowCount');
            $searchPhrase = $request->request->get('searchPhrase');
            $sort = $request->request->get('sort');
            $factures = $factureRepository->findByFilter($sort, $searchPhrase);
            if ($searchPhrase != "") {
                $count = count($factures->getQuery()->getResult());
            } else {
                $count = $factureRepository->compte();
            }
            if ($rowCount != -1) {
                $min = ($current - 1) * $rowCount;
                $max = $rowCount;
                $factures->setMaxResults($max)->setFirstResult($min);
            }
            $factures = $factures->getQuery()->getResult();
            $rows = array();
            foreach ($factures as $facture) {
                $row = array(
                    "id" => $facture->getId(),
                    "entreprise" => $facture->getMyCompany(),
                    "client" => $facture->getClientCompany(),
                    "echeance" => $this->dateToFrench(date_format($facture->getDueDate(), 'y-m-d'), 'l j F Y'),
                    "facturation" => $this->dateToFrench(date_format($facture->getInvoiceDate(), 'y-m-d'), 'l j F Y'),
                    "description" => $facture->getProjectDescription(),
                );
                array_push($rows, $row);
            }
            $data = array(
                "current" => intval($current),
                "rowCount" => intval($rowCount),
                "rows" => $rows,
                "total" => intval($count)
            );
            return new JsonResponse($data);
        }
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
                $em->persist($facture);
                $em->flush();
            }
            return $this->redirectToRoute('edit_facture', ['id' => $facture->getId()]);
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
