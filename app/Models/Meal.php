<?php

namespace App\Models;

use App\Models\Behaviors\HasActiveTitle;
use App\Models\Behaviors\HasImage;
use App\Models\Behaviors\HasCreatedBy;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Glorand\Model\Settings\Traits\HasSettingsField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meal extends Model
{
    use HasFactory,HasTranslations,SoftDeletes,HasCreatedBy,HasImage,HasActiveTitle;

    protected $fillable = [
        'name','description','settings','active','code','in_app',
        'variations','image','created_by'
    ];

    public $translatable = ['name','description'];

    protected $casts = ['variations'=>'json','settings'=>'json'];

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'meal_food')->withPivot('qty_before', 'qty_after','is_like');
    }

    public function categories()
    {
        return $this->belongsToMany(MealCategory::class, 'categories_meals');
    }

    public function meal_plans()
    {
        return $this->belongsToMany(MealPlan::class, 'plans_meals');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class,'modelable','item_tags');
    }

    public function getSettingsAttribute($value)
    {
        return json_decode($value,true);
    }
}
