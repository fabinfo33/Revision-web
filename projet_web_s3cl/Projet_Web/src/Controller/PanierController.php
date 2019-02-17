<?php

namespace App\Controller;

use App\Entity\Abonne;
use App\Entity\Achat;
use App\Form\AchatType;
use App\Form\PanierType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index(Request $request)
    {
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        /** @var Abonne $abonne */
        $abonne = $this->getUser();
        /** @var Achat[} $achats */
        $achats = $this->getDoctrine()->getRepository(Achat::class)
            ->findAllAchatNonConfirmeOfOneAbonne($abonne->getCodeAbonne());

        return $this->render('panier/index.html.twig', [
            'abonne' => $abonne,
            'achats' => $achats,
        ]);
    }
    private function calculerPrixTotal($achats) {
        $tot = 0;
        foreach ($achats as $achat) {
            $tot += $achat->getEnregistrement()->getPrix();
        }
        return $tot;
    }

    /**
     * Permet de passer la commande lorsque l'utilisateur clique sur le
     * bouton "effectuer commande" du panier
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route ("panier/commander", name="panier_commander")
     */
    public function effectuerCommande() {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        /** @var Abonne $abonne */
        $abonne = $this->getUser();
        $achatRepo =  $this->getDoctrine()
            ->getRepository(Achat::class);
        /** @var Achat[] $achatsPanier */
        $achatsPanier = $achatRepo->findAllAchatNonConfirmeOfOneAbonne($abonne->getCodeAbonne());

        if ($this->calculerPrixTotal($achatsPanier) <= $abonne->getCredit()) {
            foreach ($achatsPanier as $achat) {
                $achatRepo->confimerAchat($achat->getCodeAchat());
                $abonne->setCredit($abonne->getCredit() - $achat->getEnregistrement()->getPrix());
                $em = $this->getDoctrine()->getManagerForClass(Abonne::class);
                $em->persist($abonne);
                $em->flush();
            }
            return $this->redirectToRoute('abonne');
        } else {
            $this->addFlash('alerte', "Vous n'avez pas assez de crédits pour effectuer cette commande");
            return $this->redirectToRoute('panier');
        }
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/panierTest", name="panier_test")
     */
    public function testPanier(Request $request) {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        /** @var Abonne $abonne */
        $abonne = $this->getUser();
        $form = $this->createForm(PanierType::class, $abonne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('abonne');
        }

        return $this->render('panier/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
