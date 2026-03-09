<?php

namespace App\Controller\Admin;

use App\Entity\Editeur;
use App\Form\EditeurType;
use App\Repository\EditeurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/editeur')]
class EditeurController extends AbstractController
{
    #[Route('', name: 'app_admin_editeur_index', methods: ['GET'])]
    public function index(Request $request, EditeurRepository $repository): Response
    {
        $editeurs = Pagerfanta::createForCurrentPageWithMaxPerPage(
            new QueryAdapter($repository->createQueryBuilder('e')),
            $request->query->get('page', 1),
            10
        );

        return $this->render('admin/editeur/index.html.twig', [
            'editeurs' => $editeurs
        ]);
    }

    #[Route('/new', name: 'app_admin_editeur_new', methods: ['GET', 'POST'])]
    #[Route('/{id}/edit', name: 'app_admin_editeur_edit', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function new(?Editeur $editeur, Request $request, EntityManagerInterface $manager): Response
    {
        $editeur ??= new Editeur();
        $form = $this->createForm(EditeurType::class, $editeur);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($editeur);
            $manager->flush();

            return $this->redirectToRoute('app_admin_editeur_show', ['id' => $editeur->getId()]);
        }

        return $this->render('admin/editeur/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_editeur_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(?Editeur $editeur): Response
    {
        return $this->render('admin/editeur/show.html.twig', [
            'editeur' => $editeur,
        ]);
    }
}