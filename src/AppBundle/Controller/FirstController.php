<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Controller\FirstController;


class FirstController extends Controller
{
    /**
     * @Route("/test")
     */
	public function indexAction()
	{
		return $this->render('AppBundle:index:test.html.twig');
	}
}