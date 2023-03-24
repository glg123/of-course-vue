<?php

namespace App\Models;

use App\Models\Behaviors\AssignCreatedBy;
use App\Models\Behaviors\HasCreatedBy;
use App\Models\Behaviors\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Feature extends Model
{
    use HasFactory, HasTranslations, HasCreatedBy, SoftDeletes, AssignCreatedBy, HasImage;

    protected $fillable = [
        'name',
        'description',
        'image',
        'created_by'
    ];

    public $translatable = ['name', 'description'];

}
