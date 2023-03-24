<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoriesMeal extends Model
{
    use HasFactory;

    protected $fillable = [
        'meal_category_id','meal_id'
    ];

    public function meal(){
        return $this->belongsTo(Meal::class);
    }

    public function category(){
        return $this->belongsTo(MealCategory::class,'meal_category_id');
    }
}
