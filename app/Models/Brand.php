<?php

namespace App\Models;

use App\Models\Behaviors\HasImage;
use App\Models\Behaviors\HasCreatedBy;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory,HasTranslations,SoftDeletes,HasCreatedBy,HasImage;

    const Active_STATUS = 1;

    const disable_STATUS = 0;

    protected $fillable = [
        'name','description','settings','created_by','image','status'
    ];

    public $translatable = ['name','description'];

    public function scopeActive($query)
    {
        return $query->where('status', Self::Active_STATUS);
    }

    public function scopeDisable($query)
    {
        return $query->where('status', Self::disable_STATUS);
    }
}
