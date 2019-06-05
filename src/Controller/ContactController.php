<?php

namespace App\Controller;

use App\Entity\InfoContact;
use App\Form\InfoContactType;
use App\Repository\InfoPersoRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    const PAGE_NAME = "Contact";

    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, ObjectManager $manager, InfoPersoRepository $repoInfoPerso)
    {
        $infoPerso = $repoInfoPerso->findOneBy(["nom" => "Haumey"]);

        /*
         * Form
         */
        $infoContact = new InfoContact();
        $form = $this->createForm(InfoContactType::class, $infoContact);

        /**
         * Gestion réponse du Form
         */
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $infoContact->setDateEnvoi( new \DateTime() );

            $manager->persist($infoContact);
            $manager->flush();

            $this->addFlash("success", "Message bien envoyé" );

            return $this->redirectToRoute('contact');
        }
        else if($form->isSubmitted() ) {
            $this->addFlash("echec", "Echec de l'envoi" );
        }

        return $this->render('contact/contact.html.twig', [
            'page_name' => self::PAGE_NAME,
            'infoPerso' => $infoPerso,
            'form' => $form->createView()
        ]);
    }
}
