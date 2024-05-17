<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InviteCode extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'organization_id',
        'type',
        'expires_at',
        'code',
        'status'
    ];





}
