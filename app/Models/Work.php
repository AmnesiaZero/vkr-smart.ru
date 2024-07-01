<?php

namespace App\Models;

use Bkwld\Cloner\Cloneable;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work extends Model
{
    use HasFactory,SoftDeletes,CascadeSoftDeletes,Cloneable,BroadcastsEvents;

    protected $fillable = [
        'created',
        'organization_id',
        'year_id',
        'faculty_id',
        'department_id',
        'specialty_id',
        'user_id',
        'admin_id',
        'name',
        'path',
        'student',
        'group',
        'document_name',
        'scientific_supervisor',
        'work_type',
        'protect_date',
        'self_check',
        'assessment',
        'certificate',
        'agreement',
        'agreement_file',
        'report_id',
        'borrowings_percent',
        'quotes_percent',
        'reporting_type',
        'manual',
        'complete',
        'report_access',
        'work_status',
        'description',
        'activity_id',
        'report_status',
        'percent_person',
        'check_code',
        'verification_method',
        'user_type',
        'work_status'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'deleted_at' => 'datetime:Y-m-d',
    ];

    protected $cascadeDeletes = ['comments'];

    protected $dates = ['deleted_at'];

    public function specialty(): HasOne
    {
        return $this->hasOne(ProgramSpecialty::class, 'id', 'specialty_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function faculty():HasOne
    {
        return $this->hasOne(Faculty::class,'id','faculty_id');
    }

    public function department():HasOne
    {
        return  $this->hasOne(Department::class,'id','department_id');
    }

    public function year():HasOne
    {
        return $this->hasOne(OrganizationYear::class,'id','year_id');
    }

    public function comments():HasMany
    {
        return $this->hasMany(Comment::class,'work_id');
    }




    /**
     * Get the channels that model events should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel|\Illuminate\Database\Eloquent\Model>
     */
    public function broadcastOn(string $event): array
    {
        return [$this, $this];
    }

}
