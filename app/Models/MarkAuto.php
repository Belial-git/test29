<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int         $id
 * @property string      $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class MarkAuto extends Model
{
    protected $fillable = [
        'name',
    ];

    public function getMorphClass(): string
    {
        return 'MarkAuto';
    }
}
