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
        Schema::table('etudiants', function (Blueprint $table) {
            if (! Schema::hasColumn('etudiants', 'user_id')) {
                $table->foreignId('user_id')->after('id')->constrained()->cascadeOnDelete();
            }
            if (! Schema::hasColumn('etudiants', 'matricule')) {
                $table->string('matricule')->unique()->after('user_id');
            }
            if (! Schema::hasColumn('etudiants', 'filiere')) {
                $table->string('filiere')->after('matricule');
            }
            if (! Schema::hasColumn('etudiants', 'niveau')) {
                $table->string('niveau')->nullable()->after('filiere');
            }
            if (! Schema::hasColumn('etudiants', 'annee_scolaire')) {
                $table->string('annee_scolaire')->after('niveau');
            }
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('etudiants', function (Blueprint $table) {
            //
        });
    }
};
