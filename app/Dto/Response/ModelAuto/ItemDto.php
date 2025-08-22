<?php

declare(strict_types=1);

namespace App\Dto\Response\ModelAuto;

use Carbon\Carbon;
use OpenApi\Attributes as OA;
use Spatie\LaravelData\Data;

#[OA\Schema(schema: 'ResponseModelAutoItemDto')]
class ItemDto extends Data
{
    public int $id;
    public string $name;
    public int $mark_id;
    public ?Carbon $created_at;
    public ?Carbon $updated_at;
}
