<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'programs';


    protected $fillable = [
      'organization_id',
      'faculty_department_id',
      'user_id',
        'name',
        'educational_level',
        'level'
    ];

    public function facultyDepartment(): HasOne
    {
        return $this->hasOne(FacultyDepartment::class);
    }

}
