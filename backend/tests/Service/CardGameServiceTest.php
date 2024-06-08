<?php

namespace App\Tests\Service;

use App\Service\CardGameService;
use PHPUnit\Framework\TestCase;

class CardGameServiceTest extends TestCase
{
    private CardGameService $cardGameService;

    protected function setUp(): void
    {
        $this->cardGameService = new CardGameService();
    }

    public function testGetRandomOrder()
    {
        $colors = ['Carreaux', 'Coeur', 'Pique', 'Trèfle'];
        $shuffledColors = $this->cardGameService->getRandomOrder($colors);

        $this->assertCount(4, $shuffledColors);
        $this->assertContains('Carreaux', $shuffledColors);
        $this->assertContains('Coeur', $shuffledColors);
        $this->assertContains('Pique', $shuffledColors);
        $this->assertContains('Trèfle', $shuffledColors);
    }

    public function testGenerateRandomHand()
    {
        $hand = $this->cardGameService->generateRandomHand();

        $this->assertCount(10, $hand);
        foreach ($hand as $card) {
            $this->assertArrayHasKey('color', $card);
            $this->assertArrayHasKey('value', $card);
        }
    }

    public function testSortHand()
    {
        $hand = [
            ['color' => 'Coeur', 'value' => '10'],
            ['color' => 'Trèfle', 'value' => 'As'],
            ['color' => 'Pique', 'value' => 'Roi'],
            ['color' => 'Carreaux', 'value' => '5'],
        ];
        $colorOrder = ['Carreaux', 'Coeur', 'Pique', 'Trèfle'];
        $valueOrder = ['As', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Valet', 'Dame', 'Roi'];

        $sortedHand = $this->cardGameService->sortHand($hand, $colorOrder, $valueOrder);

        $expectedSortedHand = [
            ['color' => 'Carreaux', 'value' => '5'],
            ['color' => 'Coeur', 'value' => '10'],
            ['color' => 'Pique', 'value' => 'Roi'],
            ['color' => 'Trèfle', 'value' => 'As'],
        ];

        $this->assertEquals($expectedSortedHand, $sortedHand);
    }

}
