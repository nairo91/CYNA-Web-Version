<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart')]
    public function index(): Response
    {
        // Données fictives simulant le contenu du panier
        $cartItems = [
            [
                'id' => 1,
                'name' => 'SOC Starter',
                'description' => 'Surveillance continue 24/7 de vos bases de données.',
                'price' => 19,
                'quantity' => 1,
            ],
            [
                'id' => 2,
                'name' => 'EDR Standard',
                'description' => 'Protection endpoint & remédiation niveau 1.',
                'price' => 49,
                'quantity' => 1,
            ],
            [
                'id' => 3,
                'name' => 'MFA Access',
                'description' => 'Authentification multi-facteurs intégrée.',
                'price' => 9,
                'quantity' => 2,
            ],
        ];

        $totalPrice = array_reduce($cartItems, fn($total, $item) => $total + ($item['price'] * $item['quantity']), 0);

        return $this->render('cart/index.html.twig', [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
            'tax' => $totalPrice * 0.20,
            'finalPrice' => $totalPrice * 1.20,
        ]);
    }
}
