<?php

namespace App\Controller;

use App\Entity\Competence;
use App\Form\CompetenceType;
use App\Repository\CompetenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("admin/catégorie/competence")
 */
class CompetenceController extends AbstractController
{
    const PAGE_NAME = "Competences";

    /**
     * @Route("/new", name="competence_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $idCategorie = $request->get("idCategorie");

        $competence = new Competence();
        $form = $this->createForm(CompetenceType::class, $competence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($competence);
            $entityManager->flush();

            return $this->redirectToRoute('type_comp_show', [
                "id" => $idCategorie,
            ]);
        }

        return $this->render('competence/new.html.twig', [
            'competence' => $competence,
            'form' => $form->createView(),
            'page_name' => self::PAGE_NAME,
            'idCategorie' => $idCategorie,
        ]);
    }


    /**
     * @Route("/{id}/edit", name="competence_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Competence $competence): Response
    {
        $idCategorie = $request->get("idCategorie");

        $form = $this->createForm(CompetenceType::class, $competence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_comp_show', [
                "id" => $idCategorie,
            ]);
        }

        return $this->render('competence/edit.html.twig', [
            'competence' => $competence,
            'form' => $form->createView(),
            'page_name' => self::PAGE_NAME,
            'idCategorie' => $idCategorie,
        ]);
    }

    /**
     * @Route("/{id}", name="competence_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Competence $competence): Response
    {
        $idCategorie = $request->get("idCategorie");

        if ($this->isCsrfTokenValid('delete'.$competence->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($competence);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_comp_show', [
            "id" => $idCategorie,
        ]);
    }

}
