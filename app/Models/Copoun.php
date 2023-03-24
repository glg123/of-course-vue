<?php

namespace App\Models;

use App\Models\Behaviors\HasActiveTitle;
use App\Models\Behaviors\HasImage;
use App\Models\Behaviors\HasCreatedBy;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Copoun extends Model
{
    use HasFactory,SoftDeletes,HasImage,HasCreatedBy,HasTranslations,HasActiveTitle;
    const Active_STATUS  = 1;
    const disable_STATUS = 0;
    protected $fillable = [
        'name','description','code','status',
        'discount','discount_type','max_use','used','start_at',
        'end_at','min_order_total','packages','package_varients',
        'settings','image','created_by'
    ];

    public $translatable = ['name','description'];

    protected $casts = ['packages'=>'json','package_varients'=>'json'];

    public function offers(){
        return $this->hasMany(Offer::class);
    }

    public function copoun_subscriptions(){
        return $this->hasMany(UserSubscription::class,'copoun_id');
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


    public function getPackagesAttribute($value)
    {   
        $data=[];
        foreach (json_decode($value,true) ?? [] as  $value) {
               $data[$value] =  [
                    'id'=> $value,
                    'package_name'=> Package::find($value)->name ?? '',
                    'status'=> Package::where('id',$value)->exists(),
               ];
        }
        return $data;
    }

    public function getPackageVarientsAttribute($value)
    {
        $data=[];

        foreach (json_decode($value,true) ?? [] as  $value) {
               $data[$value] =  [
                    'id'=> $value,
                    'varient_name'=> PackageVarient::find($value)->name ?? '',
                    'status'=> PackageVarient::where('id',$value)->exists(),
               ];
        }
        return $data;
    }

    public function checkValidCopoun()
    {
        if ($this->max_use <= $this->use)
            return ['status'=>false,'message'=>'Coupon Max Use Time'];

        if (!now()->between($this->start_at,$this->end_at))
            return ['status'=>false,'message'=>'Copoun Invaild Time To Use'];

        if (!$this->status)
            return ['status'=>false,'message'=>'Copoun Invaild'];

        if (!request()->has('varient_id') || in_array(request()->get('varient_id'),array_keys($this->package_varients)) == false)
            return ['status'=>false,'message'=>'Copoun Invaild For This Package Varient'];

        return ['status'=>true,'copoun'=>$this];
    }

}
