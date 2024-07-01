<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('organizations_years', function (Blueprint $table) {
            $table->integer('year')->after('user_id'); // Добавление новой колонки 'email' после колонки 'name'
        });
    }

    public function down()
    {
        Schema::table('organizations_years', function (Blueprint $table) {
            $table->dropColumn('year'); // Удаление добавленной колонки в методе up в случае отката миграции
        });
    }
};
