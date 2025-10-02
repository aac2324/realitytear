<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('events', function (Blueprint $t) {
            // 1) Spalte hinzufügen (SQLite-freundlich: integer)
            if (!Schema::hasColumn('events', 'organizer_id')) {
                $t->unsignedBigInteger('organizer_id')->nullable()->after('id');
            }
        });

        // 2) Werte aus host_id übernehmen, falls host_id existiert
        if (Schema::hasColumn('events', 'host_id')) {
            DB::table('events')->update([
                'organizer_id' => DB::raw('host_id'),
            ]);
        }

        // 3) Optional Non-Null setzen, wenn du sicher bist, dass alle Events einen Organizer haben
        // Achtung: In SQLite ist "change()" nicht unterstützt; dann so lassen oder später über Re-Seeding sicherstellen.
        // Schema::table('events', function (Blueprint $t) {
        //     $t->unsignedBigInteger('organizer_id')->nullable(false)->change();
        // });

        // 4) (Optional) FK setzen – in SQLite tricky; kann man für local dev weglassen
        // Schema::table('events', function (Blueprint $t) {
        //     $t->foreign('organizer_id')->references('id')->on('users')->cascadeOnDelete();
        // });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $t) {
            if (Schema::hasColumn('events', 'organizer_id')) {
                // $t->dropForeign(['organizer_id']); // falls gesetzt und DB unterstützt
                $t->dropColumn('organizer_id');
            }
        });
    }
};
