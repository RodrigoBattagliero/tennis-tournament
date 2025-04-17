<?php

namespace App\Tests\Service;

use App\Const\TournamentType;
use App\ValueObject\Stage;
use App\ValueObject\Player;
use PHPUnit\Framework\Test;
use App\Strategy\PlayInterface;
use App\ValueObject\Tournament;
use PHPUnit\Framework\TestCase;
use App\Service\TournamentService;
use App\ValueObject\PlayerCollection;
use PHPUnit\Framework\MockObject\MockObject;

class TournamentServiceTest extends TestCase
{

    private Player $playerA;
    private Player $playerB;
    private Stage $stage;
    private Tournament $tournament;
    private TournamentService $service;
    private MockObject $strategy;

    protected function setUp(): void
    {
        parent::setUp();

        $this->playerA = new Player();
        $this->playerA->setName('Player A');
        $this->playerA->setHability(10);
        $this->playerA->setHability(10);
        $this->playerA->setStrenght(10);
        $this->playerA->setTravelSpeed(10);
        $this->playerA->setReactionTime(10); 
        
        $this->playerB = new Player();
        $this->playerB->setName('Player B');
        $this->playerB->setHability(10);
        $this->playerB->setHability(10);
        $this->playerB->setStrenght(10);
        $this->playerB->setTravelSpeed(10);
        $this->playerB->setReactionTime(10);

        $this->stage = new Stage;
        $this->stage->addPlayer($this->playerA);
        $this->stage->addPlayer($this->playerB);

        $this->tournament = new Tournament;
        $this->tournament->setName('');
        $this->tournament->setType(TournamentType::MALE);
        $this->tournament->addPlayer($this->playerA);
        $this->tournament->addPlayer($this->playerB);

        $this->strategy = $this->createMock(PlayInterface::class);
        $this->strategy->expects(self::once())
            ->method('play')
            ->willReturn($this->playerA)
        ;

        $this->service = new TournamentService;
        $this->service->setPlayStrategy($this->strategy);   
    }

    public function testPlayGame(): void
    {
        $actual = $this->service->playGame($this->playerA, $this->playerB);

        $this->assertInstanceOf(Player::class, $actual);
    }

    public function testGetStageWinner(): void
    {
        $actual = $this->service->getStageWinner($this->stage);

        $this->assertInstanceOf(PlayerCollection::class, $actual);
    }

    public function testGetWinner(): void
    {
        $actual = $this->service->getWinner($this->tournament);

        $this->assertInstanceOf(Player::class, $actual);
    }

    public function testSetWinner(): void
    {
        $this->service->setWinner($this->tournament);

        $this->assertInstanceOf(Player::class, $this->tournament->getWinner());
    }
}
