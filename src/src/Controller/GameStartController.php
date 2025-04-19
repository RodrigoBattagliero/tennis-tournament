<?php

namespace App\Controller;

use App\Service\GameService;
use OpenApi\Attributes as OA;
use App\DTO\TournamentRequestDTO;
use App\DTO\WinnerResponseDTO;
use App\Mapper\PlayerMapper;
use Nelmio\ApiDocBundle\Attribute\Model;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\HttpFoundation\Response as ResponseCode;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class GameStartController extends AbstractController
{

    public function __construct(
        private GameService $service,
        private PlayerMapper $playerMapper    
    ) { }
    
    
    #[Route('/api/start-game', name: 'app_start_game', methods:['POST'])]
    #[OA\RequestBody()]
    #[OA\Response(
        response: ResponseCode::HTTP_OK,
        description: 'OK',
        content: new Model(type: WinnerResponseDTO::class)
    )]
    public function gameStart(#[MapRequestPayload] TournamentRequestDTO $tournamentRequestDTO): JsonResponse
    {
        $tournament = $this->service->startGame($tournamentRequestDTO);
        return $this->json(
            $this->playerMapper->fromValueObjectToDTO($tournament->getWinner()), 
            ResponseCode::HTTP_OK
        );
    }
}
