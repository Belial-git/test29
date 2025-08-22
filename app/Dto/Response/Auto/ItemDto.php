<?php

declare(strict_types=1);

namespace App\Dto\Response\Auto;

use Carbon\Carbon;
use OpenApi\Attributes as OA;
use Spatie\LaravelData\Data;

#[OA\Schema(schema: 'ResponseAutoItemDto')]
class ItemDto extends Data
{
    public int $id;
    public string $mark_id;
    public string $model_id;
    public ?string $user_id;
    public ?string $color;
    public ?float $year_of_issue;
    public ?string $mileage;
    public ?Carbon $created_at;
    public ?Carbon $updated_at;
}
