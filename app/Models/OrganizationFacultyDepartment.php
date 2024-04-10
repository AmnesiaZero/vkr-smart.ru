<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationFacultyDepartment extends Model
{
    use HasFactory;

    protected $table = 'organizations_faculties_departments';

    protected $fillable = [
        'name',
        'year_id',
        'faculty_id',
        'user_id',
        'organization_id',
        'students_count',
        'graduates_count',
    ];
}
