<?php

namespace App\DataFixtures;

use App\Entity\ActionExpPro;
use App\Entity\Competence;
use App\Entity\DetailAction;
use App\Entity\ExpPro;
use App\Entity\InfoPerso;
use App\Entity\SiteAdmin;
use App\Entity\TypeComp;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Date;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /**
         * ExpPro + ActionExpPro + DetailAction
         */
        for ($i = 1 ; $i <= 9 ; $i++)
        {
            $expPro = new ExpPro();
            $expPro->setTitre("Titre expPro n°$i")
                   ->setLieu("Je suis le lieu n°$i")
                   ->setDate(new \DateTime("200$i-01-01"));
            if($i == 1 || $i == 5)
            {
                $expPro->setDescription("Je suis une Description de l'exp n°$i");
            }
            for ($j = 1 ; $j <= 7 ; $j++)
            {
                $actionExpPro = new ActionExpPro();
                $actionExpPro->setAction("Je suis l'action n°$j")
                             ->setExpPro($expPro);
                if ($j == 2 || $j == 4)
                {
                    for ($k = 1 ; $k <= 3 ; $k++)
                    {
                        $detailAction = new DetailAction();
                        $detailAction->setDetail("je suis un detail, le n°$k")
                                     ->setActionExpPro($actionExpPro);
                        $manager->persist($detailAction);
                    }
                }
                $manager->persist($actionExpPro);
            }
            $manager->persist($expPro);
        }

        /**
         * Site Admin
         */
        $siteAdmin = new SiteAdmin();
        $siteAdmin->setUrl("www.google.fr");
        $manager->persist($siteAdmin);

        /**
         * InfoPerso
         */
        $infoPerso = new InfoPerso();
        $infoPerso->setNom("Haumey")
                  ->setPrenom("Nicolas")
                  ->setAdresse("une rue a Nantes")
                  ->setMail("0sunaipa@gmail.com")
                  ->setTel("0684722239");
        $manager->persist($infoPerso);

        /*
         * Competence et TypeComp
         */
        for( $i = 1 ; $i <= 5 ; $i++)
        {
            $typeComp = new TypeComp();
            $typeComp->setCategorie("Catégorie n°$i");
            for ($j = 1 ; $j <= 7 ; $j++ )
            {
                $competence = new Competence();
                $competence->setTitre("Competence n°$j")
                           ->setTypeComp($typeComp);
                $manager->persist($competence);
            }
            $manager->persist($typeComp);
        }

        $manager->flush();
    }
}
