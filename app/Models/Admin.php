<?php

namespace App\Models;

use App\Models\Behaviors\HasActiveTitle;
use App\Models\Behaviors\HasFile;
use App\Models\Behaviors\HasImage;
use App\Models\Behaviors\HasPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class Admin extends Authenticatable
{
    use HasApiTokens, SoftDeletes, HasActiveTitle,HasFactory, Notifiable, HasPassword, HasRoles, HasImage,HasFile;

    use HasFactory;
}
