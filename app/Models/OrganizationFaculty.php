<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationFaculty extends Model
{
    use HasFactory;

    protected $table = 'organizations_faculties';
    protected $fillable = [
        'name',
        'year_id',
        'user_id',
        'organization_id',
        'students_count',
        'graduates_count',

    ];
}
