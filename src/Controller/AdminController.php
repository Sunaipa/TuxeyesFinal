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
     * @Route("/admin/delete{id}", name="adminDeleteSite")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteSite($id, SiteAdminRepository $repoSiteAdmin){
        //TODO=> suppréssion du SiteAdmin

        return $this->render('admin/test.html.twig', [
            'page_name' => self::PAGE_NAME,
            'test' => $id,
        ]);
    }

}

