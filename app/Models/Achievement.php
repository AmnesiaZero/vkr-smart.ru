<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $table = 'achievements';

    protected $fillable = [
         'organization_id',
         'user_id',
        'name',
        'activity',
        'educational_level',
        'description',
        'visibility',
        'date'
    ];


}
