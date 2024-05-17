<?php

namespace App\Service;

class CardGameService
{
    public array $colors = ['Carreaux', 'Coeur', 'Pique', 'Trèfle'];
    public array $values = ['As', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Valet', 'Dame', 'Roi'];

    /**
     * Mélange un tableau d'éléments et retourne l'ordre mélangé.
     * @param array $items
     * @return array
     */
    public function getRandomOrder(array $items): array
    {
        $shuffledItems = $items;
        shuffle($shuffledItems); // Mélanger le tableau en entrée
        return $shuffledItems;
    }

    /**
     * Génère une main de 10 cartes aléatoires.
     * @return array
     */
    public function generateRandomHand(): array
    {
        $deck = [];
        foreach ($this->colors as $color) {
            foreach ($this->values as $value) {
                $deck[] = ['color' => $color, 'value' => $value];
            }
        }
        shuffle($deck);
        return array_slice($deck, 0, 10);
    }

    /**
     * Trie la main de cartes selon un ordre spécifique des couleurs et des valeurs.
     * @param array $hand
     * @param array $colorOrder
     * @param array $valueOrder
     * @return array
     */
    public function sortHand(array $hand, array $colorOrder, array $valueOrder): array
    {
        usort($hand, function ($a, $b) use ($colorOrder, $valueOrder) {
            $colorComparison = array_search($a['color'], $colorOrder) <=> array_search($b['color'], $colorOrder);
            if ($colorComparison === 0) {
                return array_search($a['value'], $valueOrder) <=> array_search($b['value'], $valueOrder);
            }
            return $colorComparison;
        });

        return $hand;
    }
}
