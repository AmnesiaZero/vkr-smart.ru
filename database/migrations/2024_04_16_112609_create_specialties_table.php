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
        Schema::create('specialties', function (Blueprint $table) {
            $table->id();
            $table->integer('organization_id');
            $table->integer('program_id');
            $table->integer('specialty_id');
            $table->integer('code');
            $table->string('name');
            $table->integer('unique_percent');
            $table->integer('borrowed_percent');
            $table->boolean('is_deleted');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialties');
    }
};
