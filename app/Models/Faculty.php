<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Faculty extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'faculties';

    protected $fillable = [
        'name',
        'year_id',
        'user_id',
        'organization_id',
        'students_count',
        'graduates_count',
    ];

    public function year(): HasOne
    {
        return $this->hasOne(OrganizationYear::class);
    }

    public static function boot(): void
    {
        parent::boot();

        static::deleting(function ($post) {
            $post->facultiesDepartments()->delete();
        });
        static::replicating(function ($post){
            Log::debug('replicate у faculty');
            $post->facultiesDepartments()->replicate();
        });
    }

    public function facultiesDepartments(): HasMany
    {
        return $this->hasMany(FacultyDepartment::class,'faculty_id');
    }
}
