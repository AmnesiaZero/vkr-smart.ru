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
        $adminRole = config('roles.models.role')::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Роль админа',
            'level' => 5,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::dropIfExists('admin_role');
    }
};
