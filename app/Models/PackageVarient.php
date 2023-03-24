<?php

namespace App\Models;

use App\Transformers\OfferTransform;
use Illuminate\Database\Eloquent\Model;
use League\Fractal\Resource\Collection;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageVarient extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'package_varients';

    protected $fillable = [
        'package_id', 'name', 'days_available', 'price', 'avg_price', 'days', 'settings'
    ];

    public $translatable = ['name'];

    protected $casts = ['settings' => 'json', 'days' => 'json'];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
    public function varient_subscriptions()
    {
        return $this->hasMany(UserSubscription::class, 'package_varient_id');
    }

    public function getDaysAttribute($value)
    {
        foreach (json_decode($value, true) as $day => $value) {

            foreach ($value as $dayType => $dayDetails) {
    
                foreach ($dayDetails as $catKey => $times) {
                    if ($times != 0) {
                        $data[$day][$dayType][$catKey] = [
                            'id' => $catKey,
                            'meal_category' => MealCategory::select('id', 'name')->find($catKey)->name ?? '',
                            'times' => $times
                        ];
                    }
                }
            }
        }
        
        return $data;
    }
    public function offers()
    {
        $offers = Offer::where(['status' => 1])
            ->whereIn('copoun_id', Copoun::whereJsonContains('package_varients', $this->id)->where('status', 1)->pluck('id')->toArray())
            ->whereDate('start_at', '<=', now())
            ->whereDate('end_at', '>=', now())
            ->get()->map(function ($offer) {
                $copoun = $offer->copoun;
                return [
                    'id' => $offer->id,
                    'start_at' => $offer->start_at,
                    'end_at' => $offer->end_at,
                    'status' => $offer->id,
                    'image' => $offer->image_path,
                    'copoun' => [
                        'id' => $copoun->id,
                        'name' => $copoun->name,
                        'code' => $copoun->code,
                        'status' => $copoun->status,
                        'discount' => $copoun->discount,
                        'discount_type' => $copoun->discount_type,
                        'start_at' => $copoun->start_at,
                        'end_at' => $copoun->end_at,
                    ]
                ];
            });
        return $offers;
    }
}
