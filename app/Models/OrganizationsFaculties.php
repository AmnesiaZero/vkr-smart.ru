<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationsFaculties extends Model
{
    use HasFactory;

    protected $table = 'faculties';
    protected $fillable = [
        'name',
        'year_id',
        'user_id',
        'organization_id',
        'students_count',
        'graduates_count',

    ];
}
