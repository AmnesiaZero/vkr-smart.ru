<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorksType extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'works_types';

    protected $fillable = [
        'name',
        'organization_id'
    ];
}
