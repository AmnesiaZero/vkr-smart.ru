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

class Program extends Model
{
    use HasFactory,SoftDeletes,CascadeSoftDeletes,Cloneable;

    protected $cascadeDeletes = ['programSpecialties'];

    protected $cloneable_relations = ['programSpecialties'];



    protected $table = 'programs';

    protected $dates = ['deleted_at'];



    protected $fillable = [
      'organization_id',
      'faculty_department_id',
      'user_id',
        'name',
        'educational_level',
        'level'
    ];


    public function programSpecialties():HasMany
    {
       return $this->hasMany(ProgramSpecialty::class);
    }


}
