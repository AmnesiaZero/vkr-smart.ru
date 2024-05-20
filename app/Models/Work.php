<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
         'created',
         'organization_id',
         'year_id',
         'faculty_id',
         'department_id',
         'specialty_id',
         'user_id',
         'admin_id',
         'name',
         'student',
         'group',
         'document_name',
         'scientific_adviser',
         'work_type',
         'protect_date',
         'self_check',
         'assessment',
         'certificate',
         'agreement',
         'agreement_file',
         'report_id',
         'borrowings_percent',
         'quotes_percent',
         'reporting_type',
         'manual',
         'complete',
         'report_access',
         'work_status',
         'description',
         'activity_id',
         'report_status',
         'percent_person',
         'check_code'


    ];
}
