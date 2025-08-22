<?php
declare(strict_types=1);

namespace App\Dto\Response\MarkAuto;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ResponseMarkAutoItemDto')]
class ItemDto extends Data
{
    public int $id;
    public string $name;
    public Carbon|null $created_at;
    public Carbon|null $updated_at;
}
