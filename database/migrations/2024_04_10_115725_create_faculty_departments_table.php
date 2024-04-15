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
        Schema::create('organizations_faculties', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('year_id');
            $table->bigInteger('user_id');
            $table->bigInteger('organization_id');
            $table->string('name')->nullable();
            $table->integer('students_count')->default(0);
            $table->integer('graduates_count')->default(0);;
            $table->boolean('is_deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty_departments');
    }
};