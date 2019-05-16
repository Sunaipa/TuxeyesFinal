<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index()
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'page_name' => 'Consultant Réseau et Sécurité'
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController(venu de homme)',
            'page_name' => 'Consultant Réseau et Sécurité'
    ]);
    }
}
