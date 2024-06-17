<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('works', function (Blueprint $table) {
            // Добавление нового столбца
            $table->string('verification_method')->nullable();
        });

        // Копирование данных из старого столбца в новый
        DB::statement('UPDATE works SET verification_method = manual');

        // Удаление старого столбца
        Schema::table('works', function (Blueprint $table) {
            $table->dropColumn('manual');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('works', function (Blueprint $table) {
            // Добавление нового столбца
            $table->string('verification_method')->nullable();
        });

        // Копирование данных из старого столбца в новый
        DB::statement('UPDATE works SET verification_method = manual');

        // Удаление старого столбца
        Schema::table('works', function (Blueprint $table) {
            $table->dropColumn('manual');
        });
    }
};
