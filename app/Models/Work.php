<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'path',
        'student',
        'group',
        'document_name',
        'scientific_supervisor',
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

    public function specialty(): HasOne
    {
        return $this->hasOne(ProgramSpecialty::class, 'id', 'specialty_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
