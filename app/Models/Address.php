<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'map_long', 'map_lat', 'map_zoom', 'user_id',
        'area_id', 'block_id', 'time', 'address', 'is_default',
        'default_requested'
    ];





    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'default_requested' => 'boolean',
        'is_default' => 'boolean',
        'address' => 'json',
    ];



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function area()
    {
        return $this->belongsTo(Location::class, 'area_id');
    }

    public function block()
    {
        return $this->belongsTo(Location::class, 'block_id');
    }
}
