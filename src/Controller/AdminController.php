<?php

namespace App\Controller;

use App\Entity\SiteAdmin;
use App\Repository\SiteAdminRepository;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    const PAGE_NAME = "Administration";

    /**
     * @Route("/admin", name="admin")
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
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/admin", name="adminNHCI")
     */
    public function gestionSite()
    {

        return  $this->render('admin/TODO.html.twig', [
            'page_name' => self::PAGE_NAME,
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/admin/delete", name="adminDeleteSite")
     */
    public function deleteSite(){
        //TODO=> suppréssion du SiteAdmin

        $test = $this->getParameter('id');

        return $this->render('admin/test.html.twig', [
            'page_name' => self::PAGE_NAME,
            'test' => $test,
        ]);
    }

}
