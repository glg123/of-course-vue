<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_key','key','value','type','settings','group','lang'
    ];

    // public static function boot()
    // {
    //     parent::boot();
    // }


    protected $casts = [
        'settings'=>'json',
    ];

    public function scopeTypeSearch($query)
    {
        return $query->where('type', request()->get('type','general'));
    }

    public function getValueAttribute()
    {
      
        return isset($this->attributes['value']) && $this->group == 'file' ? url('assets/images').'/'.lcfirst(class_basename(__CLASS__)).'/'. $this->attributes['value'] : $this->attributes['value'];
    }
}
