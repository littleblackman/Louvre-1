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
use AppBundle\Entity\Sales;
use AppBundle\Entity\Tickets;
use Symfony\Component\HttpFoundation\Request;

class formController extends Controller {
     /**
     * @Route("/index")
     */
    public function addAction(Request $request)
    {
        $sale = new Sales();
        $ticket = new Tickets();
        $form = $this->createForm(\AppBundle\Form\SalesType::class, $sale);
       
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sale);
            $em->persist($ticket);
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('Confirmation', 'Youhou');
            
        }
        return $this->render('AppBundle:index:accueil.html.twig', array(
            'form' => $form->createView()
        ));
     
    }
    #public function ticketAction(Request $request)
    #{
     #   $ticket = new Tickets();
      #  $list = $this->createForm(\AppBundle\Form\TicketsType::class, $ticket);
      # return $this->render('AppBundle:index:sales.html.twig', array(
      #      'list' => $list->createView()
       # ));
    #}
}