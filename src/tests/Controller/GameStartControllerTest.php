<?php

namespace App\Tests\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class GameStartControllerTest extends WebTestCase
{
    public function testGameStart(): void
    {
        $client = static::createClient();
        $client->jsonRequest(method: 'POST', uri: 'api/start-game', parameters: $this->getArrayContent());

        self::assertResponseStatusCodeSame(Response::HTTP_CREATED);
        $this->assertJson($client->getResponse()->getContent());
    }

    private function getArrayContent(): array
    {
        return [
            'type' => 'M',
            'players' => [
                ['name' => 'Player 1', 'hability' => 75, 'strenght' => 90, 'travelSpeed' => 78, 'reactionTime' => 10 ],
                ['name' => 'Player 2', 'hability' => 75, 'strenght' => 90, 'travelSpeed' => 78, 'reactionTime' => 10 ],
                ['name' => 'Player 3', 'hability' => 75, 'strenght' => 90, 'travelSpeed' => 78, 'reactionTime' => 10 ],
                ['name' => 'Player 3', 'hability' => 75, 'strenght' => 90, 'travelSpeed' => 78, 'reactionTime' => 10 ]
            ]
        ];
    }
}
