<?php

namespace App\Controller;

use App\Repository\CompetenceRepository;
use App\Repository\ExpProRepository;
use App\Repository\InfoPersoRepository;
use App\Repository\TypeCompRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ExpertiseController extends AbstractController
{
    /**
     * @Route("/expertise", name="expertise")
     */
    public function index(ExpProRepository $repoExpPro, CompetenceRepository $repoCompetence, TypeCompRepository $repoTypeComp, InfoPersoRepository $repoInfoPerso)
    {
        $infoPerso = $repoInfoPerso->findOneBy(["nom" => "Haumey"]);

        $expPros = $repoExpPro->findAll();
        $competences = $repoTypeComp->allCompSaufFonc();
        $competencesFonc = $repoCompetence->competenceFonc();

        return $this->render('expertise/expertise.html.twig', [
            'page_name' => 'Expertise',
            'expPros' => $expPros,
            'competences' => $competences,
            'competencesFonc' => $competencesFonc,
            'infoPerso' => $infoPerso,
        ]);
    }
}
