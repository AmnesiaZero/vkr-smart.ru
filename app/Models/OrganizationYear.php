<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class OrganizationYear extends Model
{
    use HasFactory,SoftDeletes,CascadeSoftDeletes;

    protected $table = 'organizations_years';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'organization_id',
        'user_id',
        'year',
        'comment',
        'students_count'
    ];




    public function faculties(): HasMany
    {
        return $this->hasMany(Faculty::class,'year_id');
    }

}
