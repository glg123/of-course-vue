<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','package_id','price','temporary_discount','discount_expiry_date','note'
    ];
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
