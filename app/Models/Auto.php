<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int         $id
 * @property int|null    $user_id
 * @property int         $mark_id
 * @property int         $model_id
 * @property string|null $color
 * @property string|null $year_of_issue
 * @property float|null  $mileage
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Auto extends Model
{
    protected $fillable = [
        'user_id',
        'mark_id',
        'model_id',
        'color',
        'mileage',
        'year_of_issue',
    ];

    public function getMorphClass(): string
    {
        return 'Auto';
    }
}
