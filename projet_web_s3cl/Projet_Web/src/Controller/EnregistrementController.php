<?php

namespace App\Controller;

use App\Entity\Enregistrement;
use App\Form\EnregistrementType;
use App\Repository\EnregistrementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/enregistrement")
 */
class EnregistrementController extends AbstractController
{
    /**
     * @Route("/", name="enregistrement_index", methods={"GET"})
     */
    public function index(EnregistrementRepository $enregistrementRepository): Response
    {
        return $this->render('enregistrement/index.html.twig',
            ['enregistrements' => $enregistrementRepository->findBy([], null, 10)]);
    }


    /**
     * @Route("/{codeMorceau}", name="enregistrement_show", methods={"GET"})
     */
    public function show(Enregistrement $enregistrement): Response
    {
        return $this->render('enregistrement/show.html.twig', ['enregistrement' => $enregistrement]);
    }

}
