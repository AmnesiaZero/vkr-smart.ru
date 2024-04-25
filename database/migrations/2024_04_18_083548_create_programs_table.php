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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->integer('organization_id');
            $table->unsignedBigInteger('department_id');
            $table->integer('user_id');
            $table->string('name');
            $table->integer('educational_level')->default(0);
            $table->integer('level')->default(0);
            $table->softDeletes();
            $table->foreign('department_id')->references('id')->
            on('departments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
