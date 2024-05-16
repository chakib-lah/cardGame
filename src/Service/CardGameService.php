<?php

namespace App\Service;

class CardGameService
{
    public array $colors = ['Carreaux', 'Coeur', 'Pique', 'Trèfle'];
    public array $values = ['As', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Valet', 'Dame', 'Roi'];

    /**
     * Mélanger l'order de tableau random
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
     * Crée un jeu de cartes complet en combinant chaque couleur avec chaque valeur.
     * Mélange le jeu de cartes.
     * Sélectionne les 10 premières cartes du jeu mélangé pour former une main aléatoire.
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
     * Trie la main de cartes en fonction de l'ordre des couleurs et des valeurs fourni.
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
