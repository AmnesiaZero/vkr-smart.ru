<?php

namespace App\Models;

use Bkwld\Cloner\Cloneable;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes, Cloneable;

    protected $cascadeDeletes = ['programs'];

    protected $cloneable_relations = ['programs'];


    protected $table = 'departments';

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'name',
        'year_id',
        'faculty_id',
        'user_id',
        'organization_id',
        'students_count',
        'graduates_count',
    ];

    public function programs(): HasMany
    {
        return $this->hasMany(Program::class, 'department_id');
    }

    public function faculty(): HasOne
    {
        return $this->hasOne(Faculty::class, 'id', 'faculty_id');
    }

    public function year(): HasOne
    {
        return $this->hasOne(OrganizationYear::class, 'id', 'year_id');
    }
}
