<?php

namespace App\Models;

use App\Models\Behaviors\AssignCreatedBy;
use App\Models\Behaviors\HasCreatedBy;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactMethod extends Model
{
    use HasFactory, HasTranslations, HasCreatedBy, SoftDeletes, AssignCreatedBy;

    protected $fillable = [
        'name',
        'created_by'
    ];

    public $translatable = ['name'];

    // Relations
    public function users()
    {
        return $this->hasMany(User::class,'contact_method_id');
    }

}
