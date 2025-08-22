<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\MarkAuto;

use App\Dto\Response\MarkAuto\GetAllResponseDto;
use App\Dto\Response\MarkAuto\ItemDto;
use App\Http\Controllers\Controller;
use App\Models\MarkAuto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class GetController extends Controller
{
    #[
        OA\Get(
            path: '/api/v1/marks',
            operationId: 'Get marks',
            description: 'Получить список марок',
            tags: ['Marks'],
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
            'data' => ItemDto::collect(MarkAuto::all()),
        ]));
    }
}
