<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminGestionMessageController extends AbstractController
{
    const PAGE_NAME = "Administration";

    /**
     * @Route("/admin/gestion-message", name="admin_gestion_message")
     */
    public function index()
    {
        return $this->render('admin_gestion_message/message.html.twig', [
            'page_name' => self::PAGE_NAME,
        ]);
    }
}
