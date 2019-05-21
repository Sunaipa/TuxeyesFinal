<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ExpertiseController extends AbstractController
{
    /**
     * @Route("/expertise", name="expertise")
     */
    public function index()
    {
        return $this->render('expertise/index.html.twig', [
            'controller_name' => 'ExpertiseController',
        ]);
    }
}
