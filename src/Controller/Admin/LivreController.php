<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Form\LivreType;
use App\Entity\Livre;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/admin/livre')]
final class LivreController extends AbstractController
{

    #[Route('', name: 'app_admin_livre')]
    public function index(): Response
    {
        return $this->render('admin/livre/index.html.twig', [
            'controller_name' => 'LivreController',
        ]);
    }

    #[Route('/new', name: 'app_admin_livre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {  
        $livre = new Livre();
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $livre = $form->getData();
            $entityManager->persist($livre);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_livre_new');
        }
        return $this->render('admin/livre/new.html.twig', [
        'form' => $form->createView(),
        ]);
    }
}
