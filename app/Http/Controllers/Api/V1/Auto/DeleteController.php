<?php

namespace App\Http\Controllers\Api\V1\Auto;

use App\Http\Controllers\Controller;
use App\Models\Auto;
use Illuminate\Http\Response;
use OpenApi\Attributes as OA;
class DeleteController extends Controller
{
    #[
        OA\Delete(
            path: '/api/v1/autos/{id}',
            operationId: 'Delete auto',
            description: 'Удалить автомобиль',
            tags: ['Auto'],
            parameters: [
                new OA\Parameter(
                    name: 'id',
                    description: 'Auto ID',
                    in: 'path',
                    required: true,
                    schema: new OA\Schema(type: 'integer')
                ),
            ],
            responses: [
                new OA\Response(
                    response: 200,
                    description: 'Success response',
                ),
            ]
        )
    ]
    public function __invoke(int $id): Response
    {
        Auto::query()->findOrFail($id)->delete();

        return response()->noContent();
    }
}
