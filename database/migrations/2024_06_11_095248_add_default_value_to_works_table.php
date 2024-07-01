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
        Schema::table('works', function (Blueprint $table) {
            $table->string('document_name')->nullable()->change();
            $table->string('certificate')->nullable()->change();
            $table->integer('report_id')->nullable()->change();
            $table->smallInteger('borrowings_percent')->nullable()->change();
            $table->smallInteger('quotes_percent')->nullable()->change();
            $table->integer('activity_id')->nullable()->change();
            $table->integer('assessment')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('works', function (Blueprint $table) {
            //
        });
    }
};
