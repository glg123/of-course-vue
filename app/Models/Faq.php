<?php

namespace App\Models;

use App\Models\Behaviors\AssignCreatedBy;
use App\Models\Behaviors\HasActiveTitle;
use App\Models\Behaviors\HasCreatedBy;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory, HasCreatedBy, SoftDeletes, HasTranslations, HasActiveTitle, AssignCreatedBy;

    const Active_STATUS  = 1;
    const disable_STATUS = 0;

    protected $fillable = [
        'title',
        'question',
        'answer',
        'status',
        'created_by',
        'created_by',
        'show_order'
    ];

    public $translatable = ['title'];

    const STATUS_FAQ = [
        0 => 'inactive',
        1 => 'active',
    ];

    // Accessors & Mutators
    public function getStatusKeyAttribute()
    {
        return Self::STATUS_FAQ[$this->status];
    }

    public function getStatusNameAttribute()
    {
        return __('status.' . $this->getStatusKeyAttribute());
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', Self::Active_STATUS);
    }

    public function scopeDisable($query)
    {
        return $query->where('status', Self::disable_STATUS);
    }

    public function scopeActiveSearch($query)
    {
        return request()->has('status') ? $query->where('status', request()->get('status')) : $query;
    }
}
