<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReferralUser extends Model
{
    use HasFactory,SoftDeletes;

    const Active_STATUS  = 1;
    const disable_STATUS = 0;

    protected $fillable = [
        'reference_id','code','user_id','active',
        'image','variations','referral_id'
    ];

    protected $casts = ['variations'=>'json'];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->code = ReferralUser::generateUniqueCode();
        });
    }

    protected static function generateUniqueCode()
    {
        do {
            $code = random_int(100000, 999999);
        } while (self::whereCode($code)->exists());
        return $code;
    }

    public function scopeActive($query)
    {
        return $query->where('active', Self::Active_STATUS);
    }

    public function scopeDisable($query)
    {
        return $query->where('active', Self::disable_STATUS);
    }

    public function scopeActiveSearch($query)
    {
        return request()->has('status') ? $query->where('active', request()->get('status')) : $query;
    }

    public function scopeUserSearch($query)
    {
        return request()->has('user_id') ? $query->where('user_id', request()->get('user_id')) : $query;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function referral()
    {
        return $this->belongsTo(Referral::class,'referral_id');
    }

    public function transactions()
    {
        return $this->hasMany(ReferralTransaction::class,'referral_id');
    }

}
