<?php

namespace App\Models\Behaviors;

use App\Helpers\UploadHelper;

Trait HasImage
{
    use UploadHelper;

    public function setImageAttribute($image)
    {
        $this->attributes['image'] = $this->uploadAndDeleteOld($image,lcfirst(class_basename(__CLASS__)),$this->image);
    }

    public function getImagePathAttribute()
    {
        return isset($this->attributes['image']) ? url('assets/images').'/'.lcfirst(class_basename(__CLASS__)).'/'. $this->attributes['image'] : null;
    }
}
