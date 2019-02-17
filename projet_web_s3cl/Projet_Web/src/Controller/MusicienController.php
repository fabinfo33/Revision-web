<?php

namespace App\Controller;

use App\Entity\Musicien;
use App\Entity\Oeuvre;
use App\Form\MusicienType;
use App\Form\RechercheMusicienType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/musicien")
 */
class MusicienController extends AbstractController
{
    /**
     * @Route("/", name="musicien_index", methods={"GET", "POST"})
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $pagination = $paginator->paginate(
        //$this->getDoctrine()->getRepository(Musicien::class)->findAllQuery(), //juste mais ne marche pas si changement de page
            $this->getDoctrine()->getRepository(Musicien::class)->findAll(), //long à charger
            $request->query->getInt('page', 1)/*page number*/,
            10);

        $form = $this->createForm(RechercheMusicienType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $keyword = $form->get('nomPrenomMusicien')->getData();
            $musiciensTrouves = $this->getDoctrine()
                ->getRepository(Musicien::class)->findMusiciensRecherche($keyword);
            return $this->render('musicien/rechercheMusicien.html.twig', [
                'keyword' => $keyword,
                'musiciensTrouves' => $musiciensTrouves,
            ]);
        }

//        $paginator  = $this->get('knp_paginator');
//        $pagination = $this->get('knp_paginator')->paginate(
//            $musiciens, /* query NOT result */
//            $request->query->get('page', 1)/*page number*/,
//            10/*limit per page*/
//        );

        // parameters to template
            return $this->render('musicien/index.html.twig', array('pagination' => $pagination,
                'rechercheForm' => $form->createView()
            ));

        //return $this->render('musicien/index.html.twig', ['pagination' => $pagination]);
    }


    /**
     * @Route("/{codeMusicien<\d+>}", name="musicien_show", methods={"GET"})
     */
    public function show(Musicien $musicien): Response
    {
        $photo = $musicien->getPhoto();
        $oeuvres = $this->getDoctrine()->getRepository(Oeuvre::class)
            ->findAllOeuvreOfMusicien($musicien->getCodeMusicien());
        return $this->render('musicien/show.html.twig', ['musicien' => $musicien, 'photo' => $photo,
            'oeuvres' => $oeuvres
        ]);
    }

    private function data_uri($file, $mime)
    {
        $contents = file_get_contents($file);
        $base64   = base64_encode($contents);
        return ('data:' . $mime . ';base64,' . $base64);
    }


    /**
     * @Route("/best", name="musicien_best", methods={"GET"})
     */
    public function best() : Response
    {
        $musiciens = $this->getDoctrine()
            ->getRepository(Musicien::class)
            ->findBy([], null, 10);

        return $this->render('musicien/best.html.twig', ['musiciens' => $musiciens]);
    }

    /**
     * @param Musicien $musicien
     * @Route("/{codeMusicien<\d+>}/oeuvres", name="musicien_oeuvres", methods={"GET"})
     * @return Response
     */
    public function oeuvres(Musicien $musicien) : Response {
        $oeuvres = $this->getDoctrine()->getRepository(Musicien::class)
            ->findAllOeuvreOfMusicien($musicien->getCodeMusicien());
        return $this->render('musicien/oeuvres.html.twig', [
            'musicien' => $musicien,
            'oeuvres' => $oeuvres
        ]);
    }
}
