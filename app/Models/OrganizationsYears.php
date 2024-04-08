<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationsYears extends Model
{
    use HasFactory;

    protected $table = 'organizations_years';

    protected $fillable = [
        'organization_id',
        'user_id',
        'comment',
        'students_count'
    ];
}
