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
    const PAGE_NAME = "Expertise";

    /**
     * @Route("/expertise", name="expertise")
     * @param ExpProRepository $repoExpPro
     * @param CompetenceRepository $repoCompetence
     * @param TypeCompRepository $repoTypeComp
     * @param InfoPersoRepository $repoInfoPerso
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ExpProRepository $repoExpPro,
                          CompetenceRepository $repoCompetence,
                          TypeCompRepository $repoTypeComp,
                          InfoPersoRepository $repoInfoPerso)
    {
        $infoPerso = $repoInfoPerso->findOneBy(["id" => 1]);

        $expPros = $repoExpPro->findAll();
        $competencesFonc = $repoCompetence->competenceFonc();
        $allCompetences = $repoCompetence->findAll();
        $typeComps = $repoTypeComp->allTypeCompSaufFonc();

        return $this->render('expertise/expertise.html.twig', [
            'page_name' => self::PAGE_NAME,
            'infoPerso' => $infoPerso,
            'expPros' => $expPros,
            'competencesFonc' => $competencesFonc,
            'typeComps' => $typeComps,
            'allCompetences' => $allCompetences,
        ]);
    }
}
