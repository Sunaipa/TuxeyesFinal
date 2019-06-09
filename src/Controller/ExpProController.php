<?php

namespace App\Controller;

use App\Entity\ExpPro;
use App\Form\ExpProType;
use App\Repository\ExpProRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/exp-pro")
 */
class ExpProController extends AbstractController
{
    const PAGE_NAME = "Expérience professionnelle";

    /**
     * @Route("/", name="exp_pro_index", methods={"GET"})
     */
    public function index(ExpProRepository $expProRepository): Response
    {

        return $this->render('exp_pro/index.html.twig', [
            'exp_pros' => $expProRepository->findAll(),
            'page_name' => self::PAGE_NAME,
        ]);
    }

    /**
     * @Route("/new", name="exp_pro_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $expPro = new ExpPro();
        $form = $this->createForm(ExpProType::class, $expPro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($expPro);
            $entityManager->flush();

            return $this->redirectToRoute('exp_pro_index');
        }

        return $this->render('exp_pro/new.html.twig', [
            'exp_pro' => $expPro,
            'form' => $form->createView(),
            'page_name' => self::PAGE_NAME,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="exp_pro_edit", methods={"GET","POST"})
     * @param Request $request
     * @param ExpPro $expPro
     * @return Response
     */
    public function edit(Request $request, ExpPro $expPro): Response
    {
        $form = $this->createForm(ExpProType::class, $expPro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('exp_pro_index', [
                'id' => $expPro->getId(),
            ]);
        }

        return $this->render('exp_pro/edit.html.twig', [
            'exp_pro' => $expPro,
            'form' => $form->createView(),
            'page_name' => self::PAGE_NAME,
        ]);
    }

    /**
     * @Route("/{id}", name="exp_pro_delete", methods={"DELETE"})
     * @param Request $request
     * @param ExpPro $expPro
     * @return Response
     */
    public function delete(Request $request, ExpPro $expPro): Response
    {
        if ($this->isCsrfTokenValid('delete'.$expPro->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($expPro);
            $entityManager->flush();
        }

        return $this->redirectToRoute('exp_pro_index');
    }
}
