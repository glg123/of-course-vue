<?php

namespace App\Models;

use App\Observers\ReviewObserve;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id','modelable_type','modelable_id','status',
        'type','score','title','review','answer','days',
        'variations'
    ];

    public static function boot()
    {
        parent::boot();

        static::observe(ReviewObserve::class);
    }


    protected $casts = [
        'variations'=>'json',
        'days'=>'json',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

     public function scopeUserSearch($query)
    {
        return request()->has('user_id') ? $query->where('user_id', request()->get('user_id')) : $query->where('user_id',auth('api')->id());
    }

    public function scopeStatusSearch($query)
    {
        return request()->has('status') ? $query->where('status', request()->get('status')) : $query;
    }

    public function scopeTypeSearch($query)
    {
        return request()->has('type') ? $query->where('type', request()->get('type')) : $query;
    }

    public function item() {
        return $this->morphTo('modelable');
    }

    public function getItemDetailsAttribute() {
        $item =$this->item;
        if (!$item)
            return null;

        return [
            'id'=>$item->id,
            'model'=>$this->type,
            'name'=>$item->name,
            'type'=>$item->type,
        ];
    }
}
