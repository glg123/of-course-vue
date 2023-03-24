<?php

namespace App\Models;

use App\Enums\FoodStockEnum;
use App\Models\Behaviors\HasImage;
use App\Models\Behaviors\HasCreatedBy;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Glorand\Model\Settings\Traits\HasSettingsField;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Food extends Model
{
    use HasFactory, HasTranslations, SoftDeletes, HasCreatedBy, HasImage, HasSettingsField;

    protected $table = 'foods';

    protected $fillable = [
        'name', 'description', 'settings', 'unit_id', 'category_name',
        'code', 'calory', 'serve', 'stock', 'brand_id', 'refernce_id',
        'stock_reminder', 'price', 'is_component', 'is_liked',
        'variations', 'image', 'settings', 'created_by',
    ];
    protected $appends = ['select_tow_name'];
    public $translatable = ['name', 'description'];

    protected $casts = ['variations' => 'json'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function stocks()
    {
        return $this->hasMany(FoodStock::class);
    }

    public function outStocks()
    {
        return $this->hasMany(FoodStock::class)->where('type', FoodStockEnum::OUT_WARD);
    }

    public function inStocks()
    {
        return $this->hasMany(FoodStock::class)->where('type', '!=', FoodStockEnum::OUT_WARD);
    }

    public function purchaseStocks()
    {
        return $this->hasMany(FoodStock::class)->where('type', FoodStockEnum::PURCHASE);
    }

    public function adjustStocks()
    {
        return $this->hasMany(FoodStock::class)->where('type', FoodStockEnum::IN_WARD);
    }

    public function getSelectTowNameAttribute()
    {

        return $this->name;
    }

}
