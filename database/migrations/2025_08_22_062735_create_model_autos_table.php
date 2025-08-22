<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('model_autos', function (Blueprint $table): void {
            $table->id();
            $table->string('name')
                ->comment('Название автомобиля');
            $table->unsignedBigInteger('mark_id')
                ->comment('ИД марки автомобиля');
            $table->timestamps();

            $table->foreign('mark_id')
                ->references('id')
                ->on('mark_autos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_autos');
    }
};
