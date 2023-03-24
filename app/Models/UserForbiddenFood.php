<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserForbiddenFood extends Model
{
    use HasFactory;

    protected $table = 'user_forbidden_foods';
    const DISLIKE = 1;
    const LIKE = 2;
    protected $fillable = [
        'user_id','food_id','meal_id','type','variations'
    ];

    protected $casts = ['variations'=>'json'];



    public function scopeDislike($query)
    {
        return $query->where('type', Self::DISLIKE);
    }

    public function scopeLIKE($query)
    {
        return $query->where('type', Self::LIKE);
    }

    public function scopeTypeSearch($query)
    {
        return request()->has('type') ? $query->where('type', request()->get('type')) : $query;
    }

    public function scopeUserSearch($query)
    {
        return request()->has('user_id') ? $query->where('user_id', request()->get('user_id')) : $query->where('user_id',auth('api')->id());
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function food()
    {
        return $this->belongsTo(Food::class,'food_id');
    }

    public function meal()
    {
        return $this->belongsTo(Meal::class,'meal_id');
    }

}
