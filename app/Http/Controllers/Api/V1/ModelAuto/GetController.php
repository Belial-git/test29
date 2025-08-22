<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\ModelAuto;

use App\Dto\Response\Auto\ItemDto;
use App\Dto\Response\ModelAuto\GetAllResponseDto;
use App\Http\Controllers\Controller;
use App\Models\ModelAuto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class GetController extends Controller
{
    #[
        OA\Get(
            path: '/api/v1/models',
            operationId: 'Get models',
            description: 'Получить список моделей',
            tags: ['Models'],
            responses: [
                new OA\Response(
                    response: 200,
                    description: 'Success response',
                    content: new OA\JsonContent(ref: GetAllResponseDto::class)
                ),
            ]
        )
    ]
    public function __invoke(Request $request): JsonResponse
    {
        return response()->json(GetAllResponseDto::from([
            'data' => ItemDto::collect(ModelAuto::all()),
        ]));
    }
}
