<?php
declare(strict_types=1);


namespace App\Dto\Response\ModelAuto;

use OpenApi\Attributes as OA;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

#[OA\Schema(schema: 'ResponseModelAutoGetAllResponseDto')]
class GetAllResponseDto extends Data
{
    /** @var DataCollection<int, ItemDto> */
    #[
        OA\Property(type: 'array', items: new OA\Items(ref: ItemDto::class)),
        DataCollectionOf(ItemDto::class),
    ]
    public DataCollection $data;
}
