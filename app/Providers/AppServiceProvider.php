<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Auto;
use App\Models\MarkAuto;
use App\Models\ModelAuto;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Relation::morphMap([
            (new Auto())->getMorphClass() => Auto::class,
            (new MarkAuto())->getMorphClass() => MarkAuto::class,
            (new ModelAuto())->getMorphClass() => ModelAuto::class,
        ]);
    }
}
