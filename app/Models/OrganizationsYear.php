<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationsYear extends Model
{
    use HasFactory;

    protected $table = 'organizations_years';

    protected $fillable = [
        'year',
        'comment',
        'students_count'
    ];
}
