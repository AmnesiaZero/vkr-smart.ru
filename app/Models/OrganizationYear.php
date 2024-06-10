<?php

namespace App\Models;

use Bkwld\Cloner\Cloneable;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrganizationYear extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes, Cloneable;

    protected $cascadeDeletes = ['faculties'];

    protected $cloneable_relations = ['faculties'];

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
        return $this->hasMany(Faculty::class, 'year_id');
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class, 'year_id');
    }

}
