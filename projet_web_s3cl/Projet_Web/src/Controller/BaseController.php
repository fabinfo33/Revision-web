<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    /**
     * @Route("/base", name="base")
     */
    public function index()
    {
        $genres = $this->getDoctrine()->getRepository(Genre::class)->findBy([], ['libelleAbrege' => 'ASC']);
        return $this->render('base.html.twig', [
            'genres' => $genres
        ]);
    }


}
