<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_id','reference','stock','returned',
        'price','type','settings','status'
    ];

    protected $casts = ['settings'=>'json'];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class,'reference');
    }

}
