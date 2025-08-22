<?php

namespace App\Models\Trairs\Relations;

use App\Models\Auto;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Collection\Collection;

/**
 * @property Collection<int , Auto> $autos
 */
trait UserRelations
{
    /**
     * @return HasMany<Auto,$this>
     */
    public function autos(): HasMany
    {
        return $this->hasMany(Auto::class, 'user_id');
    }
}
