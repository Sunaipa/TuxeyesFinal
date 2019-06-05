<?php

namespace App\Controller;

use App\Entity\InfoContact;
use App\Form\InfoContact1Type;
use App\Repository\InfoContactRepository;
use App\Repository\InfoPersoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/messages")
 */
class InfoContactController extends AbstractController
{
    const PAGE_NAME = "Messages";

    /**
     * @Route("/", name="info_contact_index", methods={"GET"})
     * @param InfoContactRepository $infoContactRepository
     * @param InfoPersoRepository $repoInfoPerso
     * @return Response
     */
    public function index(InfoContactRepository $infoContactRepository, InfoPersoRepository $repoInfoPerso ): Response
    {
        $allMsg = $infoContactRepository->findAll();

        return $this->render('info_contact/index.html.twig', [
            'info_contacts' => $allMsg,
            'page_name' => self::PAGE_NAME,
        ]);
    }

    /**
     * @Route("/{id}", name="info_contact_show", methods={"GET"})
     * @param InfoContact $infoContact
     * @return Response
     */
    public function show(InfoContact $infoContact): Response
    {
        return $this->render('info_contact/show.html.twig', [
            'info_contact' => $infoContact,
            'page_name' => self::PAGE_NAME,
        ]);
    }

    /**
     * @Route("/{id}", name="info_contact_delete", methods={"DELETE"})
     * @param Request $request
     * @param InfoContact $infoContact
     * @return Response
     */
    public function delete(Request $request, InfoContact $infoContact): Response
    {
        if ($this->isCsrfTokenValid('delete'.$infoContact->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($infoContact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('info_contact_index', [
            'page_name' => self::PAGE_NAME,
        ]);
    }
}
