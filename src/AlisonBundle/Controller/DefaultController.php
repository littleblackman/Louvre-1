<?php

namespace AlisonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/Alison")
     */
    public function indexAction()
    {
        return $this->render('AlisonBundle:Default:index.html.twig');
    }
}
