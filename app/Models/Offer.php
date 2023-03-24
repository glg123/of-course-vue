<?php

namespace App\Models;

use App\Models\Behaviors\HasActiveTitle;
use App\Models\Behaviors\HasImage;
use App\Models\Behaviors\HasCreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends Model
{
    use HasFactory,SoftDeletes,HasImage,HasCreatedBy,HasActiveTitle;
    const Active_STATUS  = 1;
    const disable_STATUS = 0;
    protected $fillable = [
        'copoun_id','start_at','end_at','image','status',
        'settings','created_by'
    ];

    protected $casts = ['settings'=>'json'];

    public function copoun(){
        return $this->belongsTo(Copoun::class);
    }

    public function offer_subscriptions(){
        return $this->hasMany(UserSubscription::class,'offer_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', Self::Active_STATUS);
    }

    public function scopeDisable($query)
    {
        return $query->where('status', Self::disable_STATUS);
    }

    public function scopeActiveSearch($query)
    {
        return request()->has('status') ? $query->where('status', request()->get('status')) : $query;
    }
    public function scopeCopounSearch($query)
    {
        return request()->has('copoun_id') ? $query->where('copoun_id', request()->get('copoun_id')) : $query;
    }

}
