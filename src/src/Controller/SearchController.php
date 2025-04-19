<?php

namespace App\Controller;

use App\Const\TournamentType;
use App\DTO\TournamentResponseDTO;
use OpenApi\Attributes as OA;
use App\DTO\TournamentSearchRequestDTO;
use App\Entity\Tournament;
use App\Mapper\TournamentMapper;
use App\Service\TournamentSearchService;
use Nelmio\ApiDocBundle\Attribute\Model;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class SearchController extends AbstractController
{
    public function __construct(
        private readonly TournamentSearchService $tournamentSearchService,
        private readonly TournamentMapper $tournamentMapper
    ) { }
    

    #[Route('/api/search', name: 'app_search', methods:['GET'])]
    #[OA\Parameter(
        name: 'type',
        in: 'query',
        required: false,
        description: 'Type of tournament',
        schema: new OA\Schema(type: 'string', enum: [TournamentType::FEMALE, TournamentType::MALE])
    )]
    #[OA\Parameter(
        name: 'dateMin',
        in: 'query',
        required: false,
        description: 'Date of the tournament',
        schema: new OA\Schema(type: 'string', format: 'date', example: '2025-04-15')
    )]
    #[OA\Parameter(
        name: 'winnerName',
        in: 'query',
        required: false,
        description: 'Name of the winner',
        schema: new OA\Schema(type: 'string' )
    )]
    #[OA\Response(
        response: 200,
        description: 'OK',
        content: new OA\JsonContent(
            type: 'array', 
            items: new OA\Items(ref: new Model(type: TournamentResponseDTO::class))
        )
    )]
    public function search(#[MapQueryString] TournamentSearchRequestDTO $tournamentSearchRequestDTO): JsonResponse
    {
        $data = $this->tournamentSearchService->search($tournamentSearchRequestDTO);

        return $this->json(
            array_map( function (Tournament $t) {
                return $this->tournamentMapper->fromEntityToDTO($t);
            }, $data)
        );
    }


}
