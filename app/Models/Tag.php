<?php

namespace App\Models;

use App\Models\Behaviors\HasCreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
   use HasFactory,SoftDeletes,HasCreatedBy;

    const MEAL = 1;

    const CUSTOMER = 2;

    protected $fillable = [
        'name','type','created_by'
    ];

    public function scopeMeal($query)
    {
        return $query->where('type', Self::MEAL);
    }

    public function scopeCustomer($query)
    {
        return $query->where('type', Self::CUSTOMER);
    }

    public function meals()
    {
        return $this->morphedByMany(Meal::class, 'modelable','item_tags');
    }

}