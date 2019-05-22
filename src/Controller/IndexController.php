<?php

namespace App\Controller;

use App\Entity\InfoPerso;
use App\Repository\InfoPersoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{


    /**
     * @param InfoPersoRepository $repoInfoPerso
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/index", name="index")
     */
    public function index(InfoPersoRepository $repoInfoPerso)
    {
        $infoPerso = $repoInfoPerso->findOneBy(["nom" => "Haumey"]);

        return $this->render('index/index.html.twig', [
            'page_name' => 'Consultant Réseau et Sécurité',
            'infoPerso' => $infoPerso,
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="home")
     */
    public function home(InfoPersoRepository $repoInfoPerso)
    {
        $infoPerso = $repoInfoPerso->findOneBy(["nom" => "Haumey"]);

        return $this->render('index/index.html.twig', [
            'page_name' => 'Consultant Réseau et Sécurité',
            'infoPerso' => $infoPerso,
    ]);
    }
}
