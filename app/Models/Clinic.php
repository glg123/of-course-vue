<?php

namespace App\Models;

use App\Models\Behaviors\HasCreatedBy;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Clinic extends Model
{
    use HasFactory,SoftDeletes,HasCreatedBy;
    const Active_STATUS  = 1;
    const disable_STATUS = 0;
    protected $fillable = [
        'question','is_editable','status','tag',
        'order','frequency','answer_type','choices','created_by',
    ];

    // public $translatable = ['question'];

    protected $casts = ['frequency'=>'json','choices'=>'json'];

    public function answers(){
        return $this->hasMany(ClinicAnswer::class);
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

    public function scopeEditableSearch($query)
    {
        return request()->has('is_editable') ? $query->where('is_editable', request()->get('is_editable')) : $query;
    }

    public function getChoicesAttribute($value)
    {
        foreach (json_decode($value,true) as  $value) {
               $data[$value] =  [
                    'title'=> $value,
               ];
        }
        return $data;
    }

    public function getFrequencyAttribute($value)
    {
        foreach (json_decode($value,true) as  $value) {
               $data[$value] =  [
                    'title'=> $value,
               ];
        }
        return $data;
    }

}
