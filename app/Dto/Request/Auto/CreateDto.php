<?php

declare(strict_types=1);

namespace App\Dto\Request\Auto;

use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Numeric;
use Spatie\LaravelData\Attributes\Validation\Sometimes;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use OpenApi\Attributes as OA;
use Symfony\Contracts\Service\Attribute\Required;

#[OA\Schema(schema: 'RequestAutoCreateDto')]
class CreateDto extends Data
{
    #[OA\Property(description: 'Название модели'), Required, StringType]
    public string $model;
    #[OA\Property(description: 'Название марки'), Required,StringType]
    public string $mark;
    #[OA\Property(description: 'Год выпуска',default: null), Sometimes, StringType,Nullable]
    public ?string $year_of_issue;
    #[OA\Property(description: 'Пробег',default: null), Sometimes, Numeric,Nullable]
    public ?float $mileage;
    #[OA\Property(description: 'ИД пользователя',default: null), Sometimes, IntegerType, Exists('users','id'),Nullable]
    public ?int $user_id;
    #[OA\Property(description: 'Цвет',default: null), Sometimes, StringType,Nullable]
    public ?string $color;
}
