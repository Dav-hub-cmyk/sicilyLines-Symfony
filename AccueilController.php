<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

//use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * var Environment
     */
    private $twig;

    public function __construct($twig)
    {
        $this->twig = $twig ;
    }
    
    public function index(): Response
    {
        return new Response($this->render('accueil/index.html.twig'));

        

    }
}

