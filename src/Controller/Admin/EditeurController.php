<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Editeur;
use App\Form\EditeurType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/admin/editeur')]
final class EditeurController extends AbstractController
{
    #[Route('', name: 'app_admin_editeur')]
    public function index(): Response
    {
        return $this->render('admin/editeur/index.html.twig', [
            'controller_name' => 'EditeurController',
        ]);
    }

    #[Route('/new', name: 'app_admin_editeur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {       
        $editeur = new Editeur();
        $form = $this->createForm(EditeurType::class, $editeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $editeur = $form->getData();
            $entityManager->persist($editeur);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_editeur_new');
        }
            
        return $this->render('admin/editeur/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
