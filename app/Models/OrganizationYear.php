<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class OrganizationYear extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'organizations_years';

    protected $fillable = [
        'organization_id',
        'user_id',
        'year',
        'comment',
        'students_count'
    ];

    protected $dates = ['deleted_at'];

    public static function boot(): void
    {
        parent::boot();

        static::deleting(function ($post) {
            $post->faculties()->delete();
        });
       static::replicating(function ($post){
           Log::debug('replicate у years');
           $post->faculties()->copyFaculties();
       });
    }

    public function copyFaculties(): void
    {
        // Получаем все связанные элементы
        $faculties = $this->faculties()->get();

        // Копируем каждый элемент
        foreach ($faculties as $faculty) {
            $newFaculty = $faculty->replicate();
            $newFaculty->save();
        }
    }

    public function faculties(): HasMany
    {
        return $this->hasMany(Faculty::class,'year_id');
    }

}
