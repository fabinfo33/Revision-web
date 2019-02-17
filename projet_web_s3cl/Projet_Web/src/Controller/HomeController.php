<?php

namespace App\Controller;

use App\Entity\Album;
use App\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $genres = $this->getDoctrine()->getRepository(Genre::class)
            ->findAllNotEmptyEntity(); //->findBy([],['libelleAbrege' => 'ASC']);
       // $albums = $this->getDoctrine()->getRepository(Album::class)
          // ->findAllByGenre(13);

        //$albums = $genres->getAlbum();
        return $this->render('home/index.html.twig', [
            'genres' => $genres
         //   'albums' => $albums
        ]);
    }

    /**
     * @Route("/aPropos", name="aPropos")
     */
    public function aPropos(){
        return $this->render('aPropos.html.twig');
    }
//
//    /**
//     * @param Genre $genres
//     * @Route("/", name="genre_show")
//     * @return Response
//     */
//    public function albumsGenre(Genre $genres){
//        $albums = $this->getDoctrine()->getRepository(Genre::class)
//            ->findAllAlbumsOfGenre($genres->getCodeGenre());
//        return $this->render('home/index.html.twig', [
//            'genre' => $genres,
//            'albums' => $albums
//        ]);
//    }
}
