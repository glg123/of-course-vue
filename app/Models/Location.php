<?php

namespace App\Models;

use App\Models\Behaviors\HasCreatedBy;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory,HasCreatedBy,SoftDeletes,HasTranslations;
    const Active_STATUS  = 1;
    const disable_STATUS = 0;

    const AREA_TYPE      = 1;
    const BLOCK_TYPE     = 2;

    protected $fillable = [
        'name','type','area_id','status',
        'created_by','settings'
    ];
    public $translatable = ['name'];


    protected $casts = ['settings'=>'json'];

    public function zones()
    {
        return $this->hasMany(Zone::class, 'area_id');
    }

    public function blocks()
    {
        return $this->hasMany(self::class, 'area_id');
    }
    public function area()
    {
        return $this->belongsTo(self::class, 'area_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', Self::Active_STATUS);
    }

    public function scopeDisable($query)
    {
        return $query->where('status', Self::disable_STATUS);
    }

    public function scopeGetArea($query)
    {
        return $query->where('type', Self::AREA_TYPE);
    }

    public function scopeGetBlock($query)
    {
        return $query->where('type', Self::BLOCK_TYPE);
    }

    public function scopeActiveSearch($query)
    {
        return request()->has('status') ? $query->where('status', request()->get('status')) : $query;
    }

    public function scopeTypeSearch($query)
    {
        return request()->has('type') ? $query->where('type', request()->get('type')) : $query;
    }
    public function scopeAreaSearch($query)
    {
        return request()->has('area_id') ? $query->where('area_id', request()->get('area_id')) : $query;
    }

}
