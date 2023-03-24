<?php

namespace App\Models;

use App\Observers\InvoiceObserve;
use App\Models\Behaviors\HasCreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory, SoftDeletes, HasCreatedBy;

    const PURCHASE = 1;

    protected $fillable = [
        'user_id', 'invoice_id',
        'status', 'type', 'payment_method', 'payment_status',
        'price', 'qty', 'supplier_name', 'discount_value', 'total', 'tax', 'purchase_at',
        'end_at', 'copoun_id', 'coach_id', 'delivery_id', 'settings', 'created_by',
        'modelable_type', 'modelable_id',
        'pdf_file',
        'is_created',
    ];

    public static function boot()
    {
        parent::boot();

        static::observe(InvoiceObserve::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function delivery()
    {
        return $this->belongsTo(User::class, 'delivery_id');
    }

    public function coach()
    {
        return $this->belongsTo(User::class, 'coach_id');
    }

    public function copoun()
    {
        return $this->belongsTo(Copoun::class, 'copoun_id');
    }

    public function food()
    {
        return $this->belongsTo(Food::class, 'modelable_id');
    }
}
