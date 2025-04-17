<?php

namespace App\Controller;

use OA\Response;
use OA\RequestBody;
use App\ValueObject\Player;
use App\Service\GameService;
use App\DTO\TournamentRequestDTO;
use Nelmio\ApiDocBundle\Model\Model;
use App\Service\TournamentSearchService;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\HttpFoundation\Response as ResponseCode;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class GameStartController extends AbstractController
{

    public function __construct(
        private GameService $service        
    ) { }
    
    
    #[Route('/api/start-game', name: 'app_start_game', methods:['POST'])]
    #[RequestBody()]
    #[Response(
        response: 200,
        description: 'Successful response',
        content: new Model(type: Player::class)
    )]
    public function gameStart(#[MapRequestPayload] TournamentRequestDTO $tournamentRequestDTO): JsonResponse
    {
        $tournament = $this->service->startGame($tournamentRequestDTO);
        return $this->json($tournament->getWinner(), ResponseCode::HTTP_CREATED);
    }
}
