<?php

namespace App\Controller;

use App\Service\GameService;
use App\DTO\TournamentRequestDTO;
use App\DTO\TournamentSearchRequestDTO;
use App\Service\TournamentSearchService;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class IndexController extends AbstractController
{
    public function __construct(
        private GameService $service,
        private TournamentSearchService $tournamentSearchService
    ) { }

    #[Route('/', name: 'app_search', methods:['GET'])]
    public function search(#[MapQueryString] TournamentSearchRequestDTO $tournamentSearchRequestDTO): JsonResponse
    {
        $data = $this->tournamentSearchService->search($tournamentSearchRequestDTO);
        return $this->json([
            'result' => $data,
        ]);
    }

    #[Route('/', name: 'app_start_game', methods:['POST'])]
    public function game(#[MapRequestPayload] TournamentRequestDTO $tournamentRequestDTO): JsonResponse
    {
        $winner = $this->service->startGame($tournamentRequestDTO);
        return $this->json([
            'winner' => $winner,
        ]);
    }
}
