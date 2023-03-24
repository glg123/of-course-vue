<?php

namespace App\Models;

use App\Models\Behaviors\HasCreatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Unit extends Model
{
    use HasFactory,HasTranslations,SoftDeletes,HasCreatedBy;

    protected $fillable = [
        'name','description','settings','created_by'
    ];

    public $translatable = ['name','description'];

}
