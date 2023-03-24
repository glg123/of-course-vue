<?php

namespace App\Models;

use App\Models\Behaviors\HasCreatedBy;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Zone extends Model
{
    use HasFactory,SoftDeletes,HasCreatedBy,HasTranslations;
    const Active_STATUS  = 1;
    const disable_STATUS = 0;

    protected $fillable = [
        'name','area_id','status','blocks',
        'created_by','settings','morning_driver_id','evening_driver_id'
    ];
    public $translatable = ['name'];


    protected $casts = ['blocks'=>'json','settings'=>'json'];

    public function area()
    {
        return $this->belongsTo(Location::class, 'area_id');
    }
    public function morning_driver()
    {
        return $this->belongsTo(User::class, 'morning_driver_id');
    }
    public function evening_driver()
    {
        return $this->belongsTo(User::class, 'evening_driver_id');
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

    public function scopeAreaSearch($query)
    {
        return request()->has('area_id') ? $query->where('area_id', request()->get('area_id')) : $query;
    }

    public function getBlocksAttribute($value)
    {
        $data =[];
        foreach (is_array(json_decode($value,true)) ? json_decode($value,true): [] as  $value) {
               $data[] =  [
                    'id'=> $value,
                    'name'=> Location::find($value)->name ?? '',
               ];
        }
        return $data;
    }
}
