<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CardGameControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Jeu de Cartes');
        $this->assertCount(10, $crawler->filter('ul:first-of-type li')); // Vérifie 10 cartes dans la main non triée
    }

    public function testCardGameRoute()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/card/game');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Jeu de Cartes');
        $this->assertCount(10, $crawler->filter('ul:first-of-type li')); // Vérifie 10 cartes dans la main non triée
    }
}
