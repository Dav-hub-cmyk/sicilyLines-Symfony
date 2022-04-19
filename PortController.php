<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PortRepository;
use App\Entity\Port;

class PortController extends AbstractController
{
    /**
     * @Route("/port", name="port")
     */
    public function findport(PortRepository $port): Response
    {
        $port = $this->getDoctrine()
        ->getRepository(Port::class)
        ->findAll();



        return $this->render('port/port.html.twig', [
            'port' => $port,
        ]);
    }
}
