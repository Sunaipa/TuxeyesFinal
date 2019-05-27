<?php

namespace App\Controller;

use App\Entity\InfoPerso;
use App\Repository\InfoPersoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    const PAGE_NAME = "Consultant Réseau et Sécurité";

    /**
     * @param InfoPersoRepository $repoInfoPerso
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/index", name="index")
     */
    public function index(InfoPersoRepository $repoInfoPerso)
    {
        $infoPerso = $repoInfoPerso->findOneBy(["nom" => "Haumey"]);

        return $this->render('index/index.html.twig', [
            'page_name' => self::PAGE_NAME,
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
            'page_name' => self::PAGE_NAME,
            'infoPerso' => $infoPerso,
    ]);
    }
}
