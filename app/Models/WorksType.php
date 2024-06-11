<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorksType extends Model
{
    use HasFactory;

    protected $table = 'works_types';

    protected $fillable = [
        'name',
        'organization_id'
    ];
}
