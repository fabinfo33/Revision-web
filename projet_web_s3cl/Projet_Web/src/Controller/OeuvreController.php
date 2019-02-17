<?php

namespace App\Controller;

use App\Entity\Oeuvre;
use App\Form\OeuvreType;
use App\Repository\OeuvreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/oeuvre")
 */
class OeuvreController extends AbstractController
{
    /**
     * @Route("/", name="oeuvre_index", methods={"GET"})
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $pagination = $paginator->paginate(
            $this->getDoctrine()->getRepository(Oeuvre::class)->findAll(), //long à charger
            $request->query->getInt('page', 1)/*page number*/,
            10);

        return $this->render('oeuvre/index.html.twig', [
            'pagination' => $pagination
        ]);
    }

    /**
     * @Route("/{codeOeuvre}", name="oeuvre_show", methods={"GET"})
     */
    public function show(Oeuvre $oeuvre): Response
    {
        return $this->render('oeuvre/show.html.twig', [
            'oeuvre' => $oeuvre,
        ]);
    }

}
