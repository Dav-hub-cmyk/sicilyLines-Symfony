<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use App\Form\ConnectType;
use App\Entity\Client;
use Doctrine\Persistance\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HTTPFoundation\File\Exeption\FormExeption;

class ConnexionController extends AbstractController
{
    
    public function form_to_connect(Request $request, EntityManagerinterface $entityManager): Response
    {
        $client = new Client;

        $form = $this->createForm(ConnectType::class, $client);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager->persist($client);
            $entityManager->flush();
            
        }

        return $this->render('connexion/form_to_connect.html.twig', [
           'form' =>$form->createView()
        ]);


    }

    
}
