<?php

namespace App\Models;

use Bkwld\Cloner\Cloneable;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class FacultyDepartment extends Model
{
    use HasFactory,SoftDeletes,CascadeSoftDeletes,Cloneable;

    protected $cascadeDeletes = ['programs'];

    protected $cloneable_relations = ['programs'];



    protected $table = 'faculties_departments';

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
        return $this->hasMany(Program::class,'faculty_department_id');
    }
}
