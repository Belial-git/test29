<?php

namespace App\Http\Controllers\Api\V1\Auto;

use App\Dto\Request\Auto\CreateDto;
use App\Dto\Response\Auto\ItemDto;
use App\Http\Controllers\Controller;
use App\Models\Auto;
use App\Models\MarkAuto;
use App\Models\ModelAuto;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class CreateController extends Controller
{
    #[
        OA\Post(
            path: '/api/v1/autos',
            operationId: 'Create auto',
            description: 'Создать автомобиль',
            requestBody: new OA\RequestBody(content: new OA\JsonContent(ref: CreateDto::class)),
            tags: ['Auto'],
            responses: [
                new OA\Response(
                    response: 200,
                    description: 'Success response',
                    content: new OA\JsonContent(ref: ItemDto::class)
                ),
            ]
        )
    ]
    public function __invoke(CreateDto $data): JsonResponse
    {
        $mark=MarkAuto::query()
            ->firstOrCreate([
                'name' => $data->mark
            ]);
        $model=ModelAuto::query()->firstOrCreate([
            'name' => $data->model,
            'mark_id' => $mark->id
        ]);

        $auto=Auto::query()->firstOrCreate([
            'mark_id' => $mark->id,
            'model_id' => $model->id,
            'user_id' => $data->user_id ?? null,
            'color' => $data->color ?? null,
            'year_of_issue' => $data->year_of_issue ?? null,
            'mileage' => $data->mileage ?? null,
        ]);

        return response()->json(ItemDto::from($auto));
    }
}
