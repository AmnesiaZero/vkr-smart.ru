<?php

namespace App\Models;

use Bkwld\Cloner\Cloneable;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes, Cloneable;

    protected $table = 'faculties';

    protected $cascadeDeletes = ['departments'];

    protected $cloneable_relations = ['departments'];


    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'year_id',
        'user_id',
        'organization_id',
        'students_count',
        'graduates_count',
    ];


    public function departments(): HasMany
    {
        return $this->hasMany(Department::class, 'faculty_id');
    }
}
