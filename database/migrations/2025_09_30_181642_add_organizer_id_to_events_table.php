<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('events', function (Blueprint $t) {
            if (!Schema::hasColumn('events', 'organizer_id')) {
                $t->unsignedBigInteger('organizer_id')->nullable()->after('id');
            }
        });

        // Falls es noch eine alte host_id gibt: Werte übernehmen
        if (Schema::hasColumn('events', 'host_id')) {
            DB::table('events')->update(['organizer_id' => DB::raw('host_id')]);
        }
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $t) {
            if (Schema::hasColumn('events', 'organizer_id')) {
                $t->dropColumn('organizer_id');
            }
        });
    }
};
