<?php

namespace App\Controller;

use App\Service\CardGameService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CardGameController extends AbstractController
{
    #[Route('/api/card/game', name: 'api_card_game', methods: ['GET'])]
    public function index(CardGameService $cardGameService): Response
    {
        $randomColorOrder = $cardGameService->getRandomOrder($cardGameService->colors); // ordre des couleurs
        $randomValueOrder = $cardGameService->getRandomOrder($cardGameService->values); // ordre des valeurs
        $randomHand = $cardGameService->generateRandomHand(); // main non triée
        $sortedHand = $cardGameService->sortHand($randomHand, $randomColorOrder, $randomValueOrder);// main triée

        return $this->json([
            'randomHand' => $randomHand,
            'sortedHand' => $sortedHand,
            'colorOrder' => $randomColorOrder,
            'valueOrder' => $randomValueOrder,
        ]);
    }
}
