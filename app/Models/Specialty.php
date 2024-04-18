<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;

    protected $table = 'specialties';

    protected $fillable = [
        'organization_id',
        'year_id',
        'user_id',
        'name'
    ];
}
