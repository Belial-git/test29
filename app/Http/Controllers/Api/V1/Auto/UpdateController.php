<?php

namespace App\Http\Controllers\Api\V1\Auto;

use App\Dto\Request\Auto\UpdateDto;
use App\Dto\Response\Auto\ItemDto;
use App\Http\Controllers\Controller;
use App\Models\Auto;
use App\Models\MarkAuto;
use App\Models\ModelAuto;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class UpdateController extends Controller
{
    #[
        OA\Patch(
            path: '/api/v1/autos/{id}',
            operationId: 'update autos',
            description: 'Изменить данные автомобиля',
            requestBody: new OA\RequestBody(content: new OA\JsonContent(ref: UpdateDto::class)),
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
                    content: new OA\JsonContent(ref: ItemDto::class)
                ),
            ]
        )
    ]
    public function __invoke(int $id, UpdateDto $data): JsonResponse
    {
        $auto = Auto::query()->findOrFail($id);

        $mark = MarkAuto::query()->firstOrCreate([
            'name' => $data->mark,
        ]);

        $model = ModelAuto::query()->firstOrCreate([
            'name' => $data->model,
            'mark_id' => $mark->id,
        ]);

        $auto->update([
            'mark_id' => $mark->id,
            'model_id' => $model->id,
            'user_id' => $data->user_id ?? $auto->user_id,
            'color' => $data->color ?? $auto->color,
            'year_of_issue' => $data->year_of_issue ?? $auto->year_of_issue,
            'mileage' => $data->mileage ?? $auto->mileage,
        ]);

        return response()->json(ItemDto::from($auto->fresh()));
    }
}
