<?php

namespace App\Controller;

use App\Entity\Album;
use App\Entity\Enregistrement;
use App\Form\AlbumType;
use App\Form\RechercheAlbumType;
use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/album")
 */
class AlbumController extends AbstractController
{
    /**
     * @Route("/", name="album_index", methods={"GET", "POST"})
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $pagination = $paginator->paginate(
            $this->getDoctrine()->getRepository(Album::class)->findAll(), //long à charger
            $request->query->getInt('page', 1)/*page number*/,
            10);

        $form = $this->createForm(RechercheAlbumType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $keyword = $form->get('titreAlbum')->getData();
            $albumsTrouves = $this->getDoctrine()
                ->getRepository(Album::class)->findAlbumsRecherche($keyword);
            return $this->render('album/rechercheAlbum.html.twig', [
                'keyword' => $keyword,
                'albumsTrouves' => $albumsTrouves,
            ]);
        }

        return $this->render('album/index.html.twig', array('pagination' => $pagination,
            'rechercheForm' => $form->createView()
        ));

        //  return $this->render('album/index.html.twig', ['albums' => $albumRepository->findAll()]);
    }


    /**
     * @Route("/{codeAlbum}", name="album_show", methods={"GET"})
     */
    public function show(Album $album): Response
    {
        $enregistrements = $this->getDoctrine()->getRepository(Enregistrement::class)
            ->findAllEnregistrementForOneAlbumEntity($album->getCodeAlbum());
        return $this->render('album/show.html.twig', [
            'enregistrements' => $enregistrements,
            'album' => $album]);
    }


    /**
     * @param Album $album
     * @return Response
     * @Route("/{codeAlbum<\d+>}/enregistrement", name="album_enregistrement", methods={"GET"})
     */
    public function enregistrement(Album $album) : Response {
        $enregistrements = $this->getDoctrine()->getRepository(Enregistrement::class)
            ->findAllEnregistrementForOneAlbumEntity($album->getCodeAlbum());
        return $this->render('album/enregistrement.html.twig', [
            'enregistrements' => $enregistrements,
            'album' => $album
        ]);
    }

//    /**
//     * @return Response
//     * @Route("/recherche", name="album_recherche", methods={"GET"})
//     */
//    public function albumsRecherche() : Response{
//        $keyword = $this->get('titreAlbum')->getData();
//        $albumsTrouves = $this->getDoctrine()
//            ->getRepository(Album::class)->findAlbumsRecherche($keyword);
//        return $this->render('album/rechercheAlbum.html.twig', [
//            'keyword' => $keyword,
//            'albumsTrouves' => $albumsTrouves,
//        ]);
//    }

}
