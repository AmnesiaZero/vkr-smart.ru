<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoleAndPermission, SoftDeletes;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'gender',
        'login',
        'password',
        'organization_id',
        'phone',
        'date_of_birth',
        'group',
        'specialty_id',
        'is_active',
        'secret_key'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(Department::class, 'departments_users')->with(['faculty', 'year']);
    }

    public function organization(): HasOne
    {
        return $this->hasOne(Organization::class, 'id', 'organization_id');
    }

    public function works():HasMany
    {
        return $this->hasMany(Work::class,'user_id','id');
    }

    public function achievements():HasMany
    {
       return $this->hasMany(Achievement::class,'user_id','id');
    }

    public function educations():HasMany
    {
        return $this->hasMany(Education::class,'user_id','id');
    }

    public function careers():HasMany
    {
        return $this->hasMany(Career::class,'user_id','id');
    }


}
