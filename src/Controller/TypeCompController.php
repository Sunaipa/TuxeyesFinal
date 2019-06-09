<?php

namespace App\Controller;

use App\Entity\TypeComp;
use App\Form\TypeCompType;
use App\Repository\TypeCompRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/categories")
 */
class TypeCompController extends AbstractController
{
    const PAGE_NAME = "Competences";

    /**
     * @Route("/", name="type_comp_index", methods={"GET"})
     * @param TypeCompRepository $typeCompRepository
     * @return Response
     */
    public function index(TypeCompRepository $typeCompRepository): Response
    {
        return $this->render('type_comp/index.html.twig', [
            'type_comps' => $typeCompRepository->findAll(),
            'page_name' => self::PAGE_NAME,
        ]);
    }

    /**
     * @Route("/new", name="type_comp_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $typeComp = new TypeComp();
        $form = $this->createForm(TypeCompType::class, $typeComp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeComp);
            $entityManager->flush();

            return $this->redirectToRoute('type_comp_index');
        }

        return $this->render('type_comp/new.html.twig', [
            'type_comp' => $typeComp,
            'form' => $form->createView(),
            'page_name' => self::PAGE_NAME,
        ]);
    }

    /**
     * @Route("/{id}", name="type_comp_show", methods={"GET"})
     * @param TypeComp $typeComp
     * @return Response
     */
    public function show(TypeComp $typeComp): Response
    {
        return $this->render('type_comp/show.html.twig', [
            'type_comp' => $typeComp,
            'page_name' => self::PAGE_NAME,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_comp_edit", methods={"GET","POST"})
     * @param Request $request
     * @param TypeComp $typeComp
     * @return Response
     */
    public function edit(Request $request, TypeComp $typeComp): Response
    {
        $form = $this->createForm(TypeCompType::class, $typeComp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_comp_index', [
                'id' => $typeComp->getId(),
            ]);
        }

        return $this->render('type_comp/edit.html.twig', [
            'type_comp' => $typeComp,
            'form' => $form->createView(),
            'page_name' => self::PAGE_NAME,
        ]);
    }

    /**
     * @Route("/{id}", name="type_comp_delete", methods={"DELETE"})
     * @param Request $request
     * @param TypeComp $typeComp
     * @return Response
     */
    public function delete(Request $request, TypeComp $typeComp): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeComp->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeComp);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_comp_index');
    }
}
