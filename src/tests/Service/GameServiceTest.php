<?php

namespace App\Tests\Service;

use App\Entity\Tournament;
use App\Const\TournamentType;
use App\DTO\TournamentPlayerDTO;
use App\DTO\TournamentRequestDTO;
use App\Entity\Player;
use App\Service\GameService;
use App\ValueObject\Tournament as ValueObjectTournament;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class GameServiceTest extends KernelTestCase
{
    private EntityManagerInterface $manager;
    private EntityRepository $tournamentRepository;
    private EntityRepository $playerRepository;
    private GameService $gameService;

    protected function setUp(): void
    {
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->tournamentRepository = $this->manager->getRepository(Tournament::class);
        $this->playerRepository = $this->manager->getRepository(Player::class);
        $this->gameService = static::getContainer()->get(GameService::class);
    }

    public function testStartGame(): void
    {
        $tournamentDTO = new TournamentRequestDTO(TournamentType::FEMALE, [
            new TournamentPlayerDTO('Player A', 65, 90, 78, 81),
            new TournamentPlayerDTO('Player B', 66, 95, 79, 82),
            new TournamentPlayerDTO('Player C', 69, 10, 91, 83),
            new TournamentPlayerDTO('Player D', 60, 80, 77, 84)
        ]);

        $tournamentValueObject = $this->gameService->startGame($tournamentDTO);
        
        $winnerEntity = $this->playerRepository->findOneBy([
            'name' => $tournamentValueObject->getWinner()->getName()
        ]);
        
        $tournamentEntity = $this->tournamentRepository->findOneBy([
            'winner' => $winnerEntity
        ]);

        $this->assertInstanceOf(ValueObjectTournament::class, $tournamentValueObject);
        $this->assertInstanceOf(Player::class, $winnerEntity);
        $this->assertInstanceOf(Tournament::class, $tournamentEntity);
    }
}
