<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // 1) users.role
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('user')->index();
            }
            if (!Schema::hasColumn('users', 'full_name')) {
                $table->string('full_name')->nullable();
            }
        });

        // 2) events.host_id -> users.id
        Schema::table('events', function (Blueprint $table) {
            // falls alter FK existiert, erst droppen
            if (Schema::hasColumn('events', 'host_id')) {
                $table->dropForeign(['host_id']);
                $table->foreign('host_id')->references('id')->on('users')->cascadeOnDelete();
                $table->index('host_id');
            }
        });

        // 3) reviews.user_id -> users.id (safety)
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    public function down(): void {
        // Minimal rollback
        Schema::table('users', fn(Blueprint $t) => $t->dropColumn('role'));
    }
};
