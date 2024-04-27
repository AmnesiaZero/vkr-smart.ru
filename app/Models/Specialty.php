<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialty extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    protected $dates = ['deleted_at'];


    protected $table = 'specialties';

    protected $fillable = [
        'level_id',
        'code',
        'name'
    ];
}
