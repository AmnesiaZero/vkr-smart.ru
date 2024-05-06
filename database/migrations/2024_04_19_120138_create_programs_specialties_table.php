<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('programs_specialties', function (Blueprint $table) {
            $table->id();
            $table->integer('organization_id');
            $table->unsignedBigInteger('program_id');
            $table->integer('specialty_id')->nullable();
            $table->string('code')->nullable();
            $table->string('name');
            $table->integer('q_percent')->default(0);
            $table->integer('borrowed_percent')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs_specialties');
    }
};
