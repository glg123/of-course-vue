<?php

namespace App\Models;

use App\Models\Behaviors\HasImage;
use Illuminate\Database\Eloquent\Model;
use App\Observers\UserSubscriptionObserve;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSubscription extends Model
{
    use HasFactory,HasImage,SoftDeletes;
    const Active_STATUS = 1;
    const DISABLE_STATUS = 0;

    protected $fillable = [
        'user_id','package_id','package_varient_id','copoun_id','status','price',
        'discount','qty','total','active','start_at','end_at','type','offer_id',
        'trainer_id','image','payments','settings','referral_code','subscrition_type',
        'pdf_file',
        'is_created',
    ];

    protected $casts = ['payments'=>'json','settings'=>'json'];

    public static function boot()
    {
        parent::boot();

        static::observe(UserSubscriptionObserve::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function referral_code()
    {
        return $this->belongsTo(ReferralUser::class, 'referral_code');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function varient()
    {
        return $this->belongsTo(PackageVarient::class, 'package_varient_id');
    }

    public function copoun()
    {
        return $this->belongsTo(Copoun::class, 'copoun_id');
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id');
    }

    public function trainer()
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }

    public function scopeActive($query)
    {
        return $query->where('active', Self::Active_STATUS);
    }

    public function scopeDisable($query)
    {
        return $query->where('active', Self::DISABLE_STATUS);
    }

    public function scopeActiveSearch($query)
    {
        return request()->has('active') ? $query->where('active', request()->get('active')) : $query;
    }

    public function scopeStatusSearch($query)
    {
        return request()->has('status') ? $query->where('status', request()->get('status')) : $query;
    }

    public function scopeUserSearch($query)
    {
        return request()->has('user_id') ? $query->where('user_id', request()->get('user_id')) : $query->where('user_id',auth('api')->id());
    }

    public function scopeTrainerSearch($query)
    {
        return request()->has('trainer_id') ? $query->where('trainer_id', request()->get('trainer_id')) : $query;
    }
}
