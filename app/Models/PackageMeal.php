<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageMeal extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id','meal_category_id','days','variations'
    ];
    protected $casts = ['variations'=>'json','days'=>'json'];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
    public function category()
    {
        return $this->belongsTo(MealCategory::class,'meal_category_id');
    }
    public function getDaysAttribute($value)
    {
        foreach (json_decode($value,true) as $key => $value) {
            foreach($value as $index => $mealId){

                $data[$key][$mealId] = [
                    'id'=>$mealId,
                    'meal_name'=>Meal::select('id','name')->find($mealId)->name ?? '',
                    'is_default'=>$index == 0 ? true :  false
                ];
            }
        }
        return $data;
    }

  
}
