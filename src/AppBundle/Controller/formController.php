<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Sale;
use AppBundle\Entity\Ticket;
use Symfony\Component\HttpFoundation\Request;

class formController extends Controller {
       
       
     /**
     * @Route("/index")
     */
    public function addfirstAction(Request $request)
    {
        $sale = new Sale();
        $ticket = new Ticket();
        $form = $this->createForm(\AppBundle\Form\SaleType::class, $sale);
        $formticket = $this->createForm(\AppBundle\Form\TicketType::class, $ticket);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($sale);
            $em->flush();
            return $this->render('AppBundle:index:tickets.html.twig', array(
                'form' => $formticket->createView(),
            ));
            $formticket->handleRequest($request);
            if ($formticket->isSubmitted() && $formticket->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($ticket);
                $em->flush();
                return $this->render('AppBundle:order:paiement.html.twig', array(
                'form' => $form->createView(),
            ));
            }
        }
        return $this->render('AppBundle:index:accueil.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}