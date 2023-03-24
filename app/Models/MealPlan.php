<?php

namespace App\Models;

use App\Models\Behaviors\HasActiveTitle;
use App\Models\Behaviors\HasCreatedBy;
use App\Models\Behaviors\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class MealPlan extends Model
{
    use HasFactory,HasTranslations,HasActiveTitle,SoftDeletes,HasCreatedBy,HasImage;

    const Active_STATUS = 1;

    const disable_STATUS = 0;

    protected $fillable = [
        'name','description','status','variations','reference','image','created_by'
    ];

    protected $casts = ['variations'=>'json'];

    public $translatable = ['name','description'];

    public function scopeActive($query)
    {
        return $query->where('status', Self::Active_STATUS);
    }

    public function scopeDisable($query)
    {
        return $query->where('status', Self::disable_STATUS);
    }
}
