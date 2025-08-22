<?php
declare(strict_types=1);

namespace App\Dto\Response\ModelAuto;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: 'ResponseModelAutoItemDto')]
class ItemDto extends Data
{
    public int $id;
    public string $name;
    public int $mark_id;
    public Carbon|null $created_at;
    public Carbon|null $updated_at;
}
