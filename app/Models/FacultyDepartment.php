<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class FacultyDepartment extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'faculties_departments';

    protected $fillable = [
        'name',
        'year_id',
        'faculty_id',
        'user_id',
        'organization_id',
        'students_count',
        'graduates_count',
    ];

    public function faculty(): HasOne
    {
        return $this->hasOne(Faculty::class);
    }

    public static function boot(): void
    {
        parent::boot();

        static::deleting(function ($post) {
            $post->programs()->delete();
        });
        static::replicating(function ($post){
            Log::debug('replicate у faculty departments');

            $post->programs()->replicate();
        });
    }



    public function programs(): HasMany
    {
        return $this->hasMany(Program::class,'faculty_department_id');
    }
}
