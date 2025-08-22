<?php

declare(strict_types=1);

namespace App\Dto\Response\Auto;

use OpenApi\Attributes as OA;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\ArrayType;
use Spatie\LaravelData\Attributes\Validation\Sometimes;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

#[OA\Schema(schema: 'ResponseAutoGetAllResponseDto')]
class GetAllResponseDto extends Data
{
    /** @var DataCollection<int, ItemDto> */
    #[
        OA\Property(type: 'array', items: new OA\Items(ref: ItemDto::class)),
        Sometimes,
        ArrayType,
        DataCollectionOf(ItemDto::class),
    ]
    public DataCollection $data;
}
