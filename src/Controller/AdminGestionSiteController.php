<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminGestionSiteController extends AbstractController
{
    const PAGE_NAME = "Administration";

    /**
     * @Route("/admin/gestion-site", name="admin_gestion_site")
     */
    public function index()
    {
        return $this->render('admin_gestion_site/gestionSite.html.twig', [
            'page_name' => self::PAGE_NAME,
        ]);
    }

    /**
     * @Route("/admin/gestion-site/competence", name="admin_gestion_site_competence")
     */
    public function competence()
    {

        return $this->render('admin_gestion_site/gestionCompetence.html.twig', [
            'page_name' => self::PAGE_NAME,
        ]);
    }

    /**
     * @Route("/admin/gestion-site/expPro", name="admin_gestion_site_expPro")
     */
    public function expPro()
    {

        return $this->render('admin_gestion_site/gestionExpPro.html.twig', [
            'page_name' => self::PAGE_NAME,
        ]);
    }


}
