<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Editeur;
use App\Form\EditeurType;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/editeur')]
final class EditeurController extends AbstractController
{
    #[Route('/new', name: 'app_admin_editeur_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {

        $editeur = new Editeur();
        $form = $this->createForm(EditeurType::class, $editeur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $editeur = $form->getData();
            // Persist the new editeur entity

            return $this->redirectToRoute('app_admin_editeur_new');
        }

        return $this->render('admin/editeur/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
