<?php

namespace App\Models\Behaviors;

use App\Helpers\UploadHelper;

Trait HasFile
{
    use UploadHelper;

    public function setFileAttribute($file)
    {
        $this->attributes['file'] = $this->uploadAndDeleteOld($file,lcfirst(class_basename(__CLASS__)),$this->file_path);
    }

    public function getFilePathAttribute()
    {
        return isset($this->attributes['file']) ? url('assets/images').'/'.lcfirst(class_basename(__CLASS__)).'/'. $this->attributes['file'] : null;
    }
}