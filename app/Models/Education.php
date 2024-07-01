<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'organization_id',
        'user_id',
        'name',
        'start_year',
        'end_year',
        'graduation_year',
        'education_form'
    ];


}
