<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlansMeal extends Model
{
    use HasFactory;


    protected $fillable = [
        'meal_plan_id','meal_id'
    ];

    public function meal(){
        return $this->belongsTo(Meal::class);
    }

    public function meal_plan(){
        return $this->belongsTo(MealPlan::class,'meal_plan_id');
    }

}
