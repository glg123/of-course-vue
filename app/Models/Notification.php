<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = [
        'title','body','type','modelable_type','read_at','token','user_id',
        'admin_id','created_by','data'

    ];

    protected $casts = [
        'body'=>'json',
        'title'=>'json',
        'data'=>'json',
    ];

}
