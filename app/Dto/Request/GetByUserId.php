<?php

declare(strict_types=1);

namespace App\Dto\Request;

use OpenApi\Attributes as OA;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Sometimes;
use Spatie\LaravelData\Data;

#[OA\Schema(schema: 'RequestByUserIdDto')]
class GetByUserId extends Data
{
    #[OA\Property(description: 'ИД пользователя'), Sometimes, IntegerType, Exists('users', 'id'),Nullable]
    public ?int $user_id = null;
}
