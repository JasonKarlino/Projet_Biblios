<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Auteur;
use App\Form\AuteurType;
use App\Repository\AuteurRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/admin/auteur')]
final class AuteurController extends AbstractController
{

    #[Route('', name: 'app_admin_auteur')]
    public function index(AuteurRepository $auteurRepository): Response
    {
        $auteurs = $auteurRepository->findAll();

        return $this->render('admin/auteur/index.html.twig', [
            'auteurs' => $auteurs,
        ]);
    }

    #[Route('/new', name: 'app_admin_auteur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {        
        $auteur = new Auteur();
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $auteur = $form->getData();
            $entityManager->persist($auteur);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_auteur_new');
        }
        return $this->render('admin/auteur/new.html.twig', [
        'form' => $form->createView(),]);
    }

    #[Route('/{id}', name: 'app_admin_auteur_show', methods: ['GET'])]
    public function show(Auteur $auteur): Response
    {
        return $this->render('admin/auteur/show.html.twig', [
            'auteur' => $auteur,
        ]);
    }
}
