<?php //>

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PortRepository;
use App\Entity\Port;


class ReservationController extends AbstractController
{

     /**
     * var Environment
     */
    private $twig;

    public function __construct($twig)
    {
        $this->twig = $twig ;
    }
    
    public function resa(): Response
    {
        
        return new Response($this->render('reservation/resa.html.twig'));

       

    }
    
    public function findportResa(PortRepository $port): Response
    {
        $port = $this->getDoctrine()
        ->getRepository(Port::class)
        ->findAll();



        return $this->render('reservation/resa.html.twig', [
            'port' => $port,
        ]);
    }
}
