<?php

declare(strict_types=1);

namespace App\Dto\Response\MarkAuto;

use Carbon\Carbon;
use OpenApi\Attributes as OA;
use Spatie\LaravelData\Data;

#[OA\Schema(schema: 'ResponseMarkAutoItemDto')]
class ItemDto extends Data
{
    public int $id;
    public string $name;
    public ?Carbon $created_at;
    public ?Carbon $updated_at;
}
