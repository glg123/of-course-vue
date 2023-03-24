<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReferralTransaction extends Model
{
    use HasFactory;

   protected $fillable = [
        'reference_id','code','referral_id','referral_user_id','user_id','price',
        'package_id','type','variations','varient_id','subscription_id'
    ];

    protected $casts = ['variations'=>'json'];

    public function referral()
    {
        return $this->belongsTo(ReferralUser::class,'referral_id');
    }
    public function subscription()
    {
        return $this->belongsTo(UserSubscription::class,'subscription_id');
    }

    public function referral_user()
    {
        return $this->belongsTo(User::class,'referral_user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');
    }

    public function varient()
    {
        return $this->belongsTo(PackageVarient::class,'varient_id');
    }

    public function scopeUserSearch($query)
    {
        return request()->has('user_id') ? $query->where('user_id', request()->get('user_id')) : $query;
    }
    public function scopeReferralSearch($query)
    {
        return request()->has('referral_id') ? $query->where('referral_id', request()->get('referral_id')) : $query;
    }
    public function scopeReferralUserSearch($query)
    {
        return request()->has('referral_user_id') ? $query->where('referral_user_id', request()->get('referral_user_id')) : $query;
    }
}
