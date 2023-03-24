<?php

namespace App\Models;

use App\Models\Behaviors\HasImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, SoftDeletes, HasImage;

    protected $fillable = [
        'user_id', 'delivery_id', 'package_varient_id',
        'tag_id', 'tag', 'user_subscription_id', 'status', 'comment',
        'price', 'discount', 'total', 'start_at', 'delivery_cost',
        'delivery_at', 'type', 'trainer_id', 'image',
        'meals', 'address_id','settings', 'variations', 'days'
    ];


    protected $casts = [
        'variations' => 'json',
        'settings' => 'json',
        'address' => 'json',
        'meals' => 'json',
        'days' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function delivery()
    {
        return $this->belongsTo(User::class, 'delivery_id');
    }

    public function trainer()
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }



    public function user_subscription()
    {
        return $this->belongsTo(UserSubscription::class, 'user_subscription_id');
    }

    public function package_varient()
    {
        return $this->belongsTo(PackageVarient::class, 'package_varient_id');
    }

    public function order_tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }


    public function getTagAttribute()
    {
        return $this->order_tag ? $this->order_tag->name ?? '' : $this->tag;
    }

    public function getMealsAttribute($value)
    {
        $data = [];
        foreach (json_decode($value, true) ?? [] as  $value) {
            $data[] = [
                'id' => $value,
                'meal_name' => Meal::select('id', 'name')->find($value)->name ?? '',
                'status' => Meal::where('id', $value)->exists(),
            ];
        }
        return $data;
    }

    public function scopeUserSearch($query)
    {
        return request()->has('user_id') ? $query->where('user_id', request()->get('user_id')) : $query->where('user_id', auth('api')->id());
    }

    public function scopeDeliverySearch($query)
    {
        return request()->has('delivery_id') ? $query->where('delivery_id', request()->get('delivery_id')) : $query;
    }

    public function scopeShiftSearch($query)
    {
        return request()->has('shift_time') ? $query->where('shift_time', request()->get('shift_time')) : $query;
    }

    public function scopeTagSearch($query)
    {
        return request()->has('tag_id') ? $query->where('tag_id', request()->get('tag_id')) : $query;
    }

    public function scopeStatusSearch($query)
    {
        return request()->has('status') ? $query->where('status', 'pending') : $query;
    }

    public function scopeTypeSearch($query)
    {
        return request()->has('type') ? $query->where('type', request()->get('type')) : $query;
    }
}
