<?php

namespace App\Models;

use App\Models\Behaviors\HasActiveTitle;
use App\Models\Behaviors\HasFile;
use App\Observers\UserObserve;
use App\Models\Behaviors\HasImage;
//use Laravel\Passport\HasApiTokens;
use App\Models\Behaviors\HasPassword;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens, SoftDeletes, HasActiveTitle,HasFactory, Notifiable, HasPassword, HasRoles, HasImage,HasFile, HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'email', 'area_id', 'password', 'country_code', 'block_id', 'contact_method_id', 'how_find_us', 'communication', 'goal',
        'image', 'address', 'gender', 'birthday', 'age', 'status', 'settings', 'verified_at', 'remember_token', 'employee_code', 'by_employee', 'comment', 'time', 'active',
        'tag_id', 'device_token', 'referral_percent', 'max_referral_amount', 'commission_percent', 'show_order', 'celebirty_name', 'description',
        'expenses', 'designation', 'degree','file'
    ];

    public $translatable = ['first_name', 'last_name'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'verified_at' => 'datetime',
        'address' => 'json',
        'settings' => 'json',
        'description' => 'json',
    ];

    public static function boot()
    {
        parent::boot();

        static::observe(UserObserve::class);
    }

    public function contact()
    {
        return $this->belongsTo(ContactMethod::class, 'contact_method_id');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }


    public function addresses()
    {
        return $this->hasMany(Address::class, 'user_id');
    }

    public function main_address()
    {
        return Address::where(['user_id'=>$this->id,'is_default'=>true])->first();
    }

    public function area()
    {
        return $this->belongsTo(Location::class, 'area_id');
    }

    public function block()
    {
        return $this->belongsTo(Location::class, 'block_id');
    }

    public function referral_user()
    {
        return $this->belongsTo(self::class, 'by_employee');
    }

    public function user_subscriptions()
    {
        return $this->hasMany(UserSubscription::class, 'user_id');
    }

    public function codes()
    {
        return $this->hasMany(RegisterCode::class, 'user_id');
    }

    public function verifiedOtp()
    {
        return $this->codes ? $this->codes->where('type',RegisterCode::VERIFY_USER)->first() : null;
    }

    public function user_subscription()
    {
        return $this->hasOne(UserSubscription::class, 'user_id')->where('active', 1);
    }
    public function by_employee_data()
    {
        return $this->hasOne(User::class, 'by_employee');
    }

    public function trainer_subscriptions()
    {
        return $this->hasMany(UserSubscription::class, 'trainer_id');
    }

    public function celebrity_packages()
    {
        return $this->belongsToMany(Package::class, 'celebrity_packages', 'celebrity_id');
    }

    public function scopeRoleSearch($query)
    {
        return request()->has('role') && in_array(request()->get('role'), ['customer', 'dietitian', 'driver', 'celebrity']) ? $query->role(request()->get('role')) : $query;
    }

    public function getPhoneNumberAttribute()
    {
        return '00' . $this->country_code . $this->phone;
    }


    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
