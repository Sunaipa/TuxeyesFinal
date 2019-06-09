<?php

namespace App\Controller;

use App\Entity\SiteAdmin;
use App\Entity\User;
use App\Form\SiteAdminType;
use App\Repository\SiteAdminRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    const PAGE_NAME = "Administration";

    /**
     * @Route("/admin", name="admin")
     * @param SiteAdminRepository $repoSiteAdmin
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(SiteAdminRepository $repoSiteAdmin)
    {
        $allSiteAdmin =  $repoSiteAdmin->findAll();

        return $this->render('admin/admin.html.twig', [
            'page_name' => self::PAGE_NAME,
            'allSiteAdmin' => $allSiteAdmin,
        ]);
    }

    /**
     * @Route("/admin/gestion-site", name="gestionNHCI")
     */
    public function gestionNHCI()
    {
        return $this->render('admin/gestionNHCI.html.twig', [
            'page_name' => self::PAGE_NAME,
        ]);
    }

    /**
     * @Route("admin/site/new", name="site_admin_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $siteAdmin = new SiteAdmin();
        $form = $this->createForm(SiteAdminType::class, $siteAdmin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($siteAdmin);
            $entityManager->flush();

            return $this->redirectToRoute('admin');
        }

        return $this->render('site_admin/new.html.twig', [
            'page_name' => self::PAGE_NAME,
            'site_admin' => $siteAdmin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("admin/site/{id}", name="site_admin_delete", methods={"DELETE"})
     * @param Request $request
     * @param SiteAdmin $siteAdmin
     * @return Response
     */
    public function delete(Request $request, SiteAdmin $siteAdmin): Response
    {
        if ($this->isCsrfTokenValid('delete'.$siteAdmin->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($siteAdmin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin');
    }

}

