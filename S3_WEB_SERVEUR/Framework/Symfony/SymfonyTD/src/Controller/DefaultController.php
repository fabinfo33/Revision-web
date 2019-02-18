<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'welcomeMsg' => 'Bienvenue'
        ]);
    }

    /**
     * @Route("/hello/{nom}", name="hello")
     */
    public function hello($nom ="inconnu") {
        return $this->render('default/hello.html.twig', [
            'controller_name' => 'DefaultController',
            'welcomeMsg' => 'Bienvenue',
            'title' => 'hello',
            'nom' => $nom
        ]);
    }
}
