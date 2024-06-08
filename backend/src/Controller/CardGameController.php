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
        $randomColorOrder = $cardGameService->getRandomOrder($cardGameService->colors); // ordre des couleurs
        $randomValueOrder = $cardGameService->getRandomOrder($cardGameService->values); // ordre des valeurs
        $randomHand = $cardGameService->generateRandomHand(); // main non triée
        $sortedHand = $cardGameService->sortHand($randomHand, $randomColorOrder, $randomValueOrder);// main triée

        return $this->render('card_game/index.html.twig', [
            'randomHand' => $randomHand,
            'sortedHand' => $sortedHand,
            'colorOrder' => $randomColorOrder,
            'valueOrder' => $randomValueOrder,
        ]);
    }
}
