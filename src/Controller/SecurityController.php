<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    const PAGE_NAME ="Connexion";

    /**
     * @Route("/co", name="security_co")
     */
    public function connexion() {

        return $this->render('security/login.html.twig', [
            'page_name' => self::PAGE_NAME,
        ]);
    }

    /**
     * @Route("/deco",name="security_deco")
     */
    public function deconnexion() {

    }

}
