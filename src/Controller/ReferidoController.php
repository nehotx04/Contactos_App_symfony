<?php

namespace App\Controller;

use App\Entity\Referido;
use App\Form\ReferidoType;
use App\Repository\ReferidoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/referido')]
class ReferidoController extends AbstractController
{
    #[Route('/', name: 'referido_index', methods: ['GET'])]
    public function index(ReferidoRepository $referidoRepository): Response
    {
        return $this->render('referido/index.html.twig', [
            'referidos' => $referidoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'referido_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $referido = new Referido();
        $form = $this->createForm(ReferidoType::class, $referido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($referido);
            $entityManager->flush();

            return $this->redirectToRoute('referido_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('referido/new.html.twig', [
            'referido' => $referido,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'referido_show', methods: ['GET'])]
    public function show(Referido $referido): Response
    {
        return $this->render('referido/show.html.twig', [
            'referido' => $referido,
        ]);
    }

    #[Route('/{id}/edit', name: 'referido_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Referido $referido, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReferidoType::class, $referido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('referido_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('referido/edit.html.twig', [
            'referido' => $referido,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'referido_delete', methods: ['POST'])]
    public function delete(Request $request, Referido $referido, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$referido->getId(), $request->request->get('_token'))) {
            $entityManager->remove($referido);
            $entityManager->flush();
        }

        return $this->redirectToRoute('referido_index', [], Response::HTTP_SEE_OTHER);
    }
}
