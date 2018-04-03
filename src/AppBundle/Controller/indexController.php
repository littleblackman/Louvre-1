<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Sales;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
    /**
     * @Route("/index")
     */
    public function newAction(Request $request)
    {
        // creates a task and gives it some dummy data for this example
        $task = new Sales();
        $task->setSales('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();

        return $this->render('accueil.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    /**
     * @Route("/save")
     */
    public function dateAction() {
         
        return $this->render('AppBundle:index:sales.html.twig');
    }
    

}
