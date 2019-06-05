<?php

namespace App\DataFixtures;

use App\Entity\ActionExpPro;
use App\Entity\Competence;
use App\Entity\DetailAction;
use App\Entity\ExpPro;
use App\Entity\InfoContact;
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
         * InfoContact
         */
        for ($i = 1 ; $i <= 4 ; $i++)
        {
            $infoContact = new InfoContact();
            $infoContact->setNom("Mr.numéro $i")
                        ->setMail("monmail@$i.com")
                        ->setEntreprise("Mon entreprise n°$i")
                        ->setDateEnvoi(new \DateTime("200$i-01-01"))
                        ->setMessage("Je suis un message pas tres long et je suis le numéro : $i");
            if ($i == 1 )
            {
                $infoContact->setTel("06060606 $i");
            }
            $manager->persist($infoContact);
        }

        /**
         * ExpPro
         */
        for ($i = 1 ; $i <= 9 ; $i++)
        {
            $expPro = new ExpPro();
            $expPro->setTitre("Titre expPro n°$i")
                   ->setLieu("Je suis le lieu n°$i")
                   ->setDate(new \DateTime("200$i-01-01"))
                   ->setCorp("Test c'est le corp ! et voici un balise de retour à la ligne : <br/> la je suis apres  ");
            if($i == 1 || $i == 5)
            {
                $expPro->setDescription("Je suis une Description de l'exp n°$i");
            }

            $manager->persist($expPro);
        }

        /**
         * Site Admin
         */
        $siteAdmin = new SiteAdmin();
        $siteAdmin->setUrl("www.google.fr");
        $siteAdmin->setName("Google");
        $manager->persist($siteAdmin);

        $siteAdmin = new SiteAdmin();
        $siteAdmin  ->setUrl("https://symfony.com")
                    ->setName("symfony");
        $manager->persist($siteAdmin);

        $siteAdmin = new SiteAdmin();
        $siteAdmin  ->setUrl("www.test.com")
                    ->setName("test1");
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
