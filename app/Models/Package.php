<?php

namespace App\Models;

use App\Models\Behaviors\HasActiveTitle;
use App\Models\Behaviors\HasImage;
use App\Models\Behaviors\HasCreatedBy;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory,HasImage,HasTranslations,HasCreatedBy,HasActiveTitle;
    const Active_STATUS = 1;
    const DISABLE_STATUS = 0;
    protected $fillable = [
        'name','description','status','show_order','is_celebrity','start_at',
        'points','image','featured','price','variations','settings','meal_plan_id'
    ];

    public $translatable = ['name','description'];

    protected $casts = ['variations'=>'json','settings'=>'json'];

    /* in each category single row days => [sunday => day using for   [
        meal id 1 =>"Meals Id" : 1 || 0 => Default Or Not
    ]]*/
    public function meals()
    {
        return $this->hasMany(PackageMeal::class, 'package_id');
    }

    /* in days => [sunday => day using  [
        launch =>"category id" : 1 => times
    ]]*/
    public function varients()
    {
        return $this->hasMany(PackageVarient::class, 'package_id');
    }

    public function meal_plan()
    {
        return $this->belongsTo(MealPlan::class, 'meal_plan_id');
    }

    public function celebrities()
    {
        return $this->belongsToMany(User::class, 'celebrity_packages');
    }

    public function package_subscriptions()
    {
        return $this->hasMany(UserSubscription::class, 'package_id');
    }

    public function scopeActiveSearch($query)
    {
        return request()->has('status') ? $query->where('status', request()->get('status')) : $query;
    }

    public function scopePlanSearch($query)
    {
        return request()->has('plan_id') ? $query->where('meal_plan_id', request()->get('plan_id')) : $query;
    }

    public function scopeCelebritySearch($query)
    {
        return request()->has('celebrity') ? $query->where('is_celebrity', request()->get('celebrity')) : $query;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
