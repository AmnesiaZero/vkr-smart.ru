<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'works_comments';

    protected $fillable = [
        'work_id',
        'sender_id',
        'receiver_id',
        'title',
        'text',
        'parent_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'deleted_at' => 'datetime:Y-m-d',
    ];



    public function work():HasOne
    {
        return $this->hasOne(Work::class,'id','work_id');
    }

    public function sender():HasOne
    {
        return $this->hasOne(User::class,'id','sender_id');
    }

    public function receiver():HasOne
    {
        return $this->hasOne(User::class,'id','receiver_id');
    }

}
