<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->foreignId('event_id')
                  ->constrained('events')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->unsignedTinyInteger('rating'); // 1..5 (enforce in app; optional DB check below)
            $table->string('comment', 500)->nullable();

            $table->timestamps();

            // Prevent duplicate reviews by the same user for the same event
            $table->unique(['user_id', 'event_id']);

            // Optional DB-level constraint (MySQL 8.0.16+ / Postgres):
            // $table->check('rating BETWEEN 1 AND 5');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
