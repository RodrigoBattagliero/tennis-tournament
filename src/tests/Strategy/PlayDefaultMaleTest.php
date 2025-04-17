<?php

namespace App\Tests\Service;

use App\Strategy\PlayDefaultMale;
use App\ValueObject\Player;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;

class PlayDefaultMaleTest extends TestCase
{
    public function testGetExtraPoints(): void
    {
        $strategy = new PlayDefaultMale;
        
        $actual = $strategy->getExtraPoints();

        $this->assertIsInt($actual);
    }

    public function testPlayerPoints(): void
    {
        $strategy = new PlayDefaultMale;
        $player = new Player();
        $player->setName('');
        $player->setHability(10);
        $player->setHability(10);
        $player->setStrenght(10);
        $player->setTravelSpeed(10);
        $player->setReactionTime(10);
        
        $actual = $strategy->getPlayerPoints($player);

        $this->assertIsInt($actual);
    }

    public function testGetFinalPoints(): void
    {
        $strategy = new PlayDefaultMale;
        $player = new Player();
        $player->setName('');
        $player->setHability(10);
        $player->setHability(10);
        $player->setStrenght(10);
        $player->setTravelSpeed(10);
        $player->setReactionTime(10);
        
        $actual = $strategy->getFinalPoints($player);

        $this->assertIsInt($actual);
    }

    public function testPlay(): void
    {
        $strategy = new PlayDefaultMale;
        $playerA = new Player();
        $playerA->setName('Player A');
        $playerA->setHability(10);
        $playerA->setHability(10);
        $playerA->setStrenght(10);
        $playerA->setTravelSpeed(10);
        $playerA->setReactionTime(10); 
        
        $playerB = new Player();
        $playerB->setName('Player B');
        $playerB->setHability(10);
        $playerB->setHability(10);
        $playerB->setStrenght(10);
        $playerB->setTravelSpeed(10);
        $playerB->setReactionTime(10); 

        $actual = $strategy->play($playerA, $playerB);

        $this->assertInstanceOf(Player::class, $actual);

    }
}
