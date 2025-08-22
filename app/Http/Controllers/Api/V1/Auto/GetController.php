<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Auto;

use App\Dto\Response\Auto\GetAllResponseDto;
use App\Dto\Response\Auto\ItemDto;
use App\Http\Controllers\Controller;
use App\Models\Auto;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class GetController extends Controller
{
    #[
        OA\Get(
            path: '/api/v1/autos',
            operationId: 'Get autos',
            description: 'Получить автомобили',
            tags: ['Auto'],
            parameters: [
                new OA\Parameter(
                    name: 'id',
                    description: 'user ID',
                    in: 'query',
                    required: false,
                    schema: new OA\Schema(type: 'integer')
                ),
            ],
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
        $id = $request->query('id');

        if ($id) {
            /** @var User $user */
            $user = User::query()
                ->with(['autos'])
                ->findOrFail($id);
            $data = $user->autos;

            return response()->json(GetAllResponseDto::from([
                'data' => ItemDto::collect($data),
            ]));
        }

        return response()->json(GetAllResponseDto::from([
            'data' => ItemDto::collect(Auto::all()),
        ]));
    }
}
