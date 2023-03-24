<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DietitianAppointment extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'user_id','dietitian_id','date','time','price','discount','copoun_id',
        'payment_status','payment_method'
    ];

    public function dietitian(){
        return $this->belongsTo(User::class,'dietitian_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function scopeUserSearch($query)
    {
        return request()->has('user_id') ? $query->where('user_id', request()->get('user_id')) : $query->where('user_id', auth('api')->id());
    }

    public function scopeDietitianSearch($query)
    {
        return request()->has('dietitian_id') ? $query->where('dietitian_id', request()->get('dietitian_id')) : $query;
    }
    public function scopeStatusSearch($query)
    {
        return request()->has('status') ? $query->where('payment_method', request()->get('status')) : $query;
    }
}