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
        Schema::create('invite_codes', function (Blueprint $table) {
            $table->id();
            $table->integer('organization_id');
            $table->integer('type');
            $table->bigInteger('code')->unique();
            $table->date('expires_at');
            $table->boolean('status')->default(0);
            $table->boolean('is_deleted')->default(0);
            $table->unsignedBigInteger('user_id')->default(0);
//            $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invite_codes');
    }
};
