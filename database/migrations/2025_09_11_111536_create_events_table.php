<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->foreignId('host_id')->nullable()->constrained()->onDelete('cascade');


            $table->string('title');
            $table->text('description')->nullable();
            $table->string('location');
            $table->dateTime('starts_at')->nullable();

            $table->timestamps();

            $table->index(['host_id', 'starts_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

