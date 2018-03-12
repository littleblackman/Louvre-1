<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class indexController extends Controller {

    /**
     * @Route("/index")
     */
    public function indexAction() {
         
        //return new Response ("Mon Welcome");
        //return new Response (array('Test 1', 'Test 2'));
        return $this->render('AppBundle:index:accueil.html.twig', array(
                    'var1' => 'Horaires',
                    'var2' => 'Texte2'

        ));
    }

}
