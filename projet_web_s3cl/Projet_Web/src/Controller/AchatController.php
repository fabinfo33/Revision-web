<?php

namespace App\Controller;

use App\Entity\Achat;
use App\Entity\Enregistrement;
use App\Form\AchatType;
use App\Repository\AchatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/achat")
 */
class AchatController extends AbstractController
{
    /**
     * @Route("/", name="achat_index", methods={"GET"})
     */
    public function index(AchatRepository $achatRepository): Response
    {
        return $this->render('achat/index.html.twig', [
            'achats' => $achatRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="achat_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $achat = new Achat();
        $form = $this->createForm(AchatType::class, $achat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($achat);
            $entityManager->flush();

            return $this->redirectToRoute('achat_index');
        }

        return $this->render('achat/new.html.twig', [
            'achat' => $achat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Enregistrement $enregistrement
     * @Route("/new/{codeMorceau<\d+>}",name="panier_ajouter")
     * @return RedirectResponse
     */
    public function ajouterAuPanier(Enregistrement $enregistrement, Request $request) {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $repo =  $this->getDoctrine()->getRepository(Achat::class)
            ->ajouterAchatPanier($enregistrement->getCodeMorceau(), $this->getUser()->getCodeAbonne());
        $this->addFlash('alerte', 'Enregistrement ajouté au panier');
        return $this->redirect($request->server->get('HTTP_REFERER')); //redirige vers la page précédente
    }

    /**
     * @Route("/{codeAchat}", name="achat_show", methods={"GET"})
     */
    public function show(Achat $achat): Response
    {
        return $this->render('achat/show.html.twig', [
            'achat' => $achat,
        ]);
    }

    /**
     * @Route("/{codeAchat}/edit", name="achat_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Achat $achat
     * @return Response
     */
    public function edit(Request $request, Achat $achat): Response
    {
        $form = $this->createForm(AchatType::class, $achat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('achat_index', [
                'codeAchat' => $achat->getCodeAchat(),
            ]);
        }
        /* TEST A SUPPRIMER
        $this->getDoctrine()->getRepository(Achat::class)
            ->confimerAchat($achat->getCodeAchat());
        */

        return $this->render('achat/edit.html.twig', [
            'achat' => $achat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{codeAchat}", name="achat_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Achat $achat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$achat->getCodeAchat(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($achat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('panier');
    }
}
