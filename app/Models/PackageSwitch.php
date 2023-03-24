<?php

namespace App\Models;

use App\Models\Behaviors\HasCreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageSwitch extends Model
{
    use HasFactory, HasCreatedBy;

    const Active_STATUS = 1;
    const disable_STATUS = 0;

    protected $fillable = [
        'package_id_from', 'package_varient_id_from', 'package_id_to', 'package_varient_id_to',
        'status', 'created_by', 'settings'
    ];

    protected $casts = ['settings' => 'json'];

    public function packageFrom()
    {
        return $this->belongsTo(Package::class, 'package_id_from');
    }
    public function varientFrom()
    {
        return $this->belongsTo(PackageVarient::class, 'package_varient_id_from');
    }

    public function packageTo()
    {
        return $this->belongsTo(Package::class, 'package_id_to');
    }
    public function varientTo()
    {
        return $this->belongsTo(PackageVarient::class, 'package_varient_id_to');
    }

    public function scopeActive($query)
    {
        return $query->where('status', Self::Active_STATUS);
    }

    public function scopeDisable($query)
    {
        return $query->where('status', Self::disable_STATUS);
    }
}
