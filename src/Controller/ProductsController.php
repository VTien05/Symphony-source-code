<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\ControllerList;
use App\Entity\VRList;
use App\Entity\Feedback;
use App\Form\FeedbackType;


class ProductsController extends AbstractController
{
    #[Route('/', name: 'app_products')]
    public function index(): Response
    {
        return $this->render('products/index.html.twig', [
            'controller_name' => 'ProductsController',
        ]);
    }

    #[Route('/products', name: 'products_list')]
    public function products_list(ManagerRegistry $doctrine): Response
    {
        $products = $doctrine->getRepository(ControllerList::class)->findAll();
        //list
        return $this->render('products/products-list.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/vr', name: 'vr_list')]
    public function vr_list(ManagerRegistry $doctrine): Response
    {
        $vr = $doctrine->getRepository(VRList::class)->findAll();
        //list
        return $this->render('products/vr-list.html.twig', [
            'vr' => $vr,
        ]);
    }

    #[Route('/sign', name: 'test')]
    public function sign_up(): Response
    {
        return $this->render('sign-up.html.twig', [
            'controller_name' => 'ProductsController',
        ]);
    }

    #[Route('/feedback', name: 'feedback')]
    public function feedback_test(ManagerRegistry $doctrine, Request $request): Response
    {
        $feedback = new Feedback();
        $form = $this->createForm(FeedbackType::class, $feedback);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           $feedback = $form->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($feedback);
            $entityManager->flush();
            return $this->redirectToRoute('app_products');
        }
        return $this->renderForm('feedback.html.twig', [
            'controller_name' => 'ProductsController',
            'form' => $form
        ]);
    }
}
