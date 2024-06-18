<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdditionalFile extends Model
{
    use HasFactory;

    protected $table = 'additional_files';

    protected $fillable = [
        'work_id',
        'organization_id',
        'user_id',
        'file_name',
        'path',
        'file_size',
        'extension'
    ];
}
