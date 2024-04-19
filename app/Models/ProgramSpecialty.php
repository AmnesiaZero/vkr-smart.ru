<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramSpecialty extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'organization_id',
        'program_id',
        'specialty_id',
        'code',
        'q_percent',
        'borrowed_percent'
    ];
}
