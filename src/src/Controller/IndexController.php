<?php

namespace App\Controller;

use App\Dto\TournamentRequest;
use App\DTO\TournamentRequestDTO;
use App\Service\GameService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;

final class IndexController extends AbstractController
{
    public function __construct(
        private GameService $service
    ) { }

    #[Route('/', name: 'app_index', methods:['POST'])]
    public function index(#[MapRequestPayload] TournamentRequestDTO $tournamentRequestDTO): JsonResponse
    {
        $winner = $this->service->startGame($tournamentRequestDTO);
        return $this->json([
            'message' => $winner,
        ]);
    }
}
