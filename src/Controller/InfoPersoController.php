<?php

namespace App\Controller;

use App\Entity\InfoPerso;
use App\Form\InfoPersoType;
use App\Repository\InfoPersoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/info/perso")
 */
class InfoPersoController extends AbstractController
{
    const PAGE_NAME = "Info Personnelle ";

    /**
     * @Route("/", name="info_perso_index", methods={"GET"})
     */
    public function index(InfoPersoRepository $infoPersoRepository): Response
    {
        return $this->render('info_perso/index.html.twig', [
            'info_persos' => $infoPersoRepository->findAll(),
            'page_name' => self::PAGE_NAME,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="info_perso_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, InfoPerso $infoPerso): Response
    {
        $form = $this->createForm(InfoPersoType::class, $infoPerso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('info_perso_index', [
                'id' => $infoPerso->getId(),
            ]);
        }

        return $this->render('info_perso/edit.html.twig', [
            'info_perso' => $infoPerso,
            'form' => $form->createView(),
            'page_name' => self::PAGE_NAME,
        ]);
    }

}
