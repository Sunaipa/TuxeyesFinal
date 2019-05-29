<?php

namespace App\Controller;

use App\Entity\ActionExpPro;
use App\Entity\DetailAction;
use App\Entity\ExpPro;
use App\Form\ActionExpProType;
use App\Form\DetailActionType;
use App\Form\ExpProType;
use App\Repository\InfoPersoRepository;
use function Sodium\add;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    const PAGE_NAME = "Contact";

    /**
     * @Route("/contact", name="contact")
     */
    public function index(InfoPersoRepository $repoInfoPerso)
    {
        $infoPerso = $repoInfoPerso->findOneBy(["nom" => "Haumey"]);

        $expert = new ExpPro();
        $action = new ActionExpPro();
        $detail = new DetailAction();

        $form = $this->createForm(ExpProType::class, $expert);
        $form2 = $this->createForm(ActionExpProType::class, $action);
        $form3 = $this->createForm(DetailActionType::class, $detail);



        return $this->render('contact/contact.html.twig', [
            'page_name' => self::PAGE_NAME,
            'infoPerso' => $infoPerso,
            'formTest'  => $form->createView(),
            'formTest2'  => $form2->createView(),
            'formTest3'  => $form3->createView(),

        ]);
    }
}
