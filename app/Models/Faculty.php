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

class Faculty extends Model
{
    use HasFactory,SoftDeletes,CascadeSoftDeletes,Cloneable;

    protected $table = 'faculties';

    protected $cascadeDeletes = ['facultiesDepartments'];

    protected $cloneable_relations = ['facultiesDepartments'];


    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'year_id',
        'user_id',
        'organization_id',
        'students_count',
        'graduates_count',
    ];


    public function facultiesDepartments(): HasMany
    {
        return $this->hasMany(FacultyDepartment::class,'faculty_id');
    }
}
