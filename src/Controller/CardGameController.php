<?php

namespace App\Controller;

use App\Service\CardGameService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CardGameController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    #[Route('/card/game', name: 'app_card_game')]
    public function index(CardGameService $cardGameService): Response
    {
        $randomColorOrder = $cardGameService->getRandomOrder($cardGameService->colors);
        $randomValueOrder = $cardGameService->getRandomOrder($cardGameService->values);
        $randomHand = $cardGameService->generateRandomHand();
        $sortedHand = $cardGameService->sortHand($randomHand, $randomColorOrder, $randomValueOrder);

        return $this->render('card_game/index.html.twig', [
            'randomHand' => $randomHand,
            'sortedHand' => $sortedHand,
            'colorOrder' => $randomColorOrder,
            'valueOrder' => $randomValueOrder,
        ]);
    }
}
