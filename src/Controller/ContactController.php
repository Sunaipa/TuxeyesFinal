<?php

namespace App\Controller;

use App\Repository\InfoPersoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(InfoPersoRepository $repoInfoPerso)
    {
        $infoPerso = $repoInfoPerso->findOneBy(["nom" => "Haumey"]);



        return $this->render('contact/contact.html.twig', [
            'page_name' => 'Contact',
            'infoPerso' => $infoPerso,
        ]);
    }
}
