<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int         $id
 * @property string      $name
 * @property int         $mark_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class ModelAuto extends Model
{
    protected $fillable = [
        'name',
        'mark_id',
    ];

    public function getMorphClass(): string
    {
        return 'MorphClass';
    }
}
