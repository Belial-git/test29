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
        Schema::create('autos', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id')
                ->nullable()
                ->default(null)
                ->comment('ИД пользователя');
            $table->unsignedTinyInteger('mark_id')
                ->comment('ИД марки автомобиля');
            $table->unsignedTinyInteger('model_id')
                ->comment('ИД модели автомобиля');
            $table->string('year_of_issue')
                ->nullable()
                ->default(null)
                ->comment('Год выпуска');
            $table->string('color')
                ->nullable()
                ->default(null)
                ->comment('Цвет');
            $table->decimal('mileage')
                ->nullable()
                ->default(null)
                ->comment('Год выпуска');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('mark_id')
                ->references('id')
                ->on('mark_autos');
            $table->foreign('model_id')
                ->references('id')
                ->on('model_autos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autos');
    }
};
