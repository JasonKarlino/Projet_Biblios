<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Livre;
use App\Form\LivreType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/livre')]
final class LivreController extends AbstractController
{
    #[Route('/new', name: 'app_admin_livre_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $livre = new Livre();
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $livre = $form->getData();
            // do something with the data, like saving it to the database

            return $this->redirectToRoute('app_admin_livre_new');
        }

        return $this->render('admin/livre/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
