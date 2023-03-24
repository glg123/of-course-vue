<?php

namespace App\Models;

use App\Observers\RegisterCodeObserve;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegisterCode extends Model
{
    use HasFactory;
    const VERIFY_USER = 1; //Default
    const RESET_PASSWORD = 2;

    protected $fillable = [
        'user_id','via','code','expired_at','type'
    ];

    public static function boot()
    {
        parent::boot();

        static::observe(RegisterCodeObserve::class);
    }

    public function scopeVerify($query)
    {
        return $query->where('type', 1);
    }

    public function scopeResetPassword($query)
    {
        return $query->where('type', 2);
    }

    public function user()
    {
        return $this->BelongsTo(User::class,'user_id');
    }

}
