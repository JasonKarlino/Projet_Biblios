<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Auteur;
use App\Form\AuteurType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;


#[Route('/admin/auteur')]
final class AuteurController extends AbstractController
{
    #[Route('/new', name: 'app_admin_auteur_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $auteur = new Auteur();
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $auteur = $form->getData();
            // ... perform some action, such as saving the auteur to the database
            // for example, if Auteur is a Doctrine entity, save it!
            return $this->redirectToRoute('app_admin_auteur_new');
        }
        return $this->render('admin/auteur/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
