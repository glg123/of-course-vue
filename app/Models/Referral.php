<?php

namespace App\Models;

use App\Models\Behaviors\HasImage;
use App\Models\Behaviors\HasCreatedBy;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Referral extends Model
{
    use HasFactory,HasImage,HasCreatedBy,SoftDeletes,HasTranslations;
    const Active_STATUS  = 1;
    const disable_STATUS = 0;
    protected $fillable = [
        'reference_id','name','additional_days','bonus',
        'active','image','all_package','packages',
        'package_varients','variations','created_by'
    ];

    public $translatable = ['name'];

    protected $casts = ['variations'=>'json','package_varients'=>'json','packages'=>'json'];


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


    public function getPackagesAttribute($value)
    {
        foreach (json_decode($value,true) as  $value) {
               $data[] =  [
                    'id'=> $value,
                    'name'=> Package::find($value)->name ?? '',
               ];
        }
        return $data;
    }

    public function getPackageVarientsAttribute($value)
    {
        foreach (json_decode($value,true) as  $value) {
               $data[] =  [
                    'id'=> $value,
                    'name'=> PackageVarient::find($value)->name ?? '',
               ];
        }
        return $data;
    }
}
