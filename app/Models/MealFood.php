<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MealFood extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_id','meal_category_id','is_like','qty_before','qty_after','settings'
    ];

    public function food(){
        return $this->belongsTo(Food::class);
    }

    public function category(){
        return $this->belongsTo(MealCategory::class,'meal_category_id');
    }

}
