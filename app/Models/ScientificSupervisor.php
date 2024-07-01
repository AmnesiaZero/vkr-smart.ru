<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScientificSupervisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'organization_id'
    ];
}
