<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class celebrityPackage extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'package_id','celebrity_id'
    ];

    public function package(){
        return $this->belongsTo(Package::class,'package_id');
    }

    public function celebrity(){
        return $this->belongsTo(User::class,'celebrity_id');
    }
}
