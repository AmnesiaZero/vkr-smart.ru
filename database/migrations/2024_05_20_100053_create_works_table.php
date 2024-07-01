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
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->date('created')->nullable();
            $table->boolean('is_deleted')->default(0);
            $table->integer('organization_id');
            $table->integer('year_id');
            $table->integer('faculty_id');
            $table->integer('department_id');
            $table->integer('specialty_id');
            $table->integer('user_id');
            $table->integer('admin_id');
            $table->string('name');
            $table->string('student')->nullable();
            $table->string('group')->nullable();
            $table->string('document_name');
            $table->string('scientific_adviser')->nullable();
            $table->string('work_type')->nullable();
            $table->date('protect_date');
            $table->boolean('self_check')->default(0);
            $table->string('assessment');
            $table->string('certificate');
            $table->boolean('agreement')->default(0);
            $table->string('agreement_file')->nullable();
            $table->string('path');
            $table->string('pdf_path')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer('report_id');
            $table->boolean('bad_convert')->nullable();
            $table->date('converting_start')->nullable();
            $table->date('converting_end')->nullable();
            $table->smallInteger('borrowings_percent');
            $table->smallInteger('quotes_percent');
            $table->tinyInteger('reporting_type')->default(0);
            $table->boolean('manual')->default(0);
            $table->boolean('complete')->default(0);
            $table->boolean('report_access')->default(0);
            $table->boolean('work_status')->default(0);
            $table->string('description')->nullable();
            $table->integer('activity_id');
            $table->tinyInteger('report_status')->default(2);
            $table->string('percent_person')->nullable();
            $table->integer('check_code')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
