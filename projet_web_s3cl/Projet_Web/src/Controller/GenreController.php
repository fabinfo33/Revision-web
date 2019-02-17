<?php

namespace App\Controller;

use App\Entity\Album;
use App\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GenreController extends AbstractController
{
    /**
     * @Route("/genre", name="genre")
     */
    public function index()
    {
        $genres = $this->getDoctrine()->getRepository(Genre::class)->findAllNotEmptyEntity();
        return $this->render('genre/index.html.twig', [
            'genres' => $genres
        ]);
    }

    /**
     * @param Genre $genres
     * @Route("/genre/{codeGenre<\d+>}", name="genre_show")
     * @return Response
     */
    public function albumsGenre(Genre $genres){
        $albums = $this->getDoctrine()->getRepository(Album::class)
            ->findAllByGenre($genres->getCodeGenre());
        return $this->render('genre/show.html.twig', [
            'genre' => $genres,
            'albums' => $albums
        ]);
    }
}
