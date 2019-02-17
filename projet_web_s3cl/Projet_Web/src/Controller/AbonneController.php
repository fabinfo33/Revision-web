<?php

namespace App\Controller;

use App\Entity\Abonne;
use App\Entity\Achat;
use App\Form\CreditType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AbonneController extends AbstractController
{
    /**
     * @Route("/abonne", name="abonne")
     */
    public function index()
    {
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        $abonne = $this->getUser();
        $achats = $this->getDoctrine()->getRepository(Achat::class)
            ->findAllAchatConfirmeOfOneAbonne($abonne->getCodeAbonne());
        return $this->render('abonne/index.html.twig', [
            'abonne' => $abonne,
            'achats' => $achats
        ]);
    }

    /**
     * @Route("/abonne/profil", name="abonne_profil")
     */
    public function profil(Request $request) {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        /** @var Abonne $abonne */
        $abonne = $this->getUser();
        $form = $this->createForm(CreditType::class, $abonne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('alerte', 'Votre compte a été crédité');
            return $this->redirectToRoute('abonne');
        }

        return $this->render('abonne/profil.html.twig', [
            'abonne' => $abonne,
            'form' => $form->createView()
        ]);
    }
}
