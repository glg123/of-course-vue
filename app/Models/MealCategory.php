<?php

namespace App\Models;

use App\Models\Behaviors\HasActiveTitle;
use App\Models\Behaviors\HasImage;
use App\Models\Behaviors\HasCreatedBy;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MealCategory extends Model
{
    use HasFactory,HasTranslations,SoftDeletes,HasCreatedBy,HasImage,HasActiveTitle;

    const Active_STATUS = 1;

    const disable_STATUS = 0;

    protected $fillable = [
        'name','description','status','variations','reference','image','settings','created_by'
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
    public function meals()
    {
        return $this->belongsToMany(Meal::class, 'categories_meals');
    }

}
