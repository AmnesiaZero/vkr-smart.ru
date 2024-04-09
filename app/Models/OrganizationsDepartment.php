<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationsDepartment extends Model
{
    use HasFactory;

    protected $table = 'organizations_departments';

    protected $fillable = [
        'name'
    ];
}
