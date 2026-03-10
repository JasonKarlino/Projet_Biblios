<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Form\LivreType;
use App\Entity\Livre;
use App\Repository\LivreRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Doctrine\ORM\QueryAdapter;

#[Route('/admin/livre')]
final class LivreController extends AbstractController
{

    #[Route('', name: 'app_admin_livre_index')]
    public function index(Request $request, LivreRepository $livreRepository): Response
    {
        $livres = Pagerfanta::createForCurrentPageWithMaxPerPage(
            new QueryAdapter($livreRepository->createQueryBuilder('l')),
            $request->query->get('page', 1),
            20
        );

        return $this->render('admin/livre/index.html.twig', [
            'livres' => $livres,
        ]);
    } 

    #[Route('/new', name: 'app_admin_livre_new', methods: ['GET', 'POST'])]
    #[Route('/{id}/edit', name: 'app_admin_livre_edit', methods: ['GET', 'POST'])]
    public function new(?Livre $livre, Request $request, EntityManagerInterface $entityManager): Response
    {  
        $livre = $livre ?? new Livre();
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager->persist($livre);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_livre_index');
        }
        return $this->render('admin/livre/new.html.twig', [
        'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_admin_livre_show', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(Livre $livre): Response
    {
        return $this->render('admin/livre/show.html.twig', [
            'livre' => $livre,
        ]);
    }
}
