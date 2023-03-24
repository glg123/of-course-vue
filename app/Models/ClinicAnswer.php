<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClinicAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'clinic_id','user_id','answer','comment','rate'
    ];

    public function question(){
        return $this->belongsTo(Clinic::class,'clinic_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeUserSearch($query)
    {
        return request()->has('user_id') ? $query->where('clinic_id', request()->get('user_id')) : $query;
    }

    public function scopeQuestionSearch($query)
    {
        return request()->has('question_id') ? $query->where('clinic_id', request()->get('question_id')) : $query;
    }


}
