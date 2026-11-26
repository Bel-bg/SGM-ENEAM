<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('filieres', function (Blueprint $table) {
            if (! Schema::hasColumn('filieres', 'code')) {
                $table->string('code', 20)->unique()->after('id');
            }
            if (! Schema::hasColumn('filieres', 'nom')) {
                $table->string('nom')->unique()->after('code');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('filieres', function (Blueprint $table) {
            //
        });
    }
};
