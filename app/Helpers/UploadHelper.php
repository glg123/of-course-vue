<?php

namespace App\Helpers;

use App\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

trait UploadHelper
{
    public function upload($file, $folder, $name = '', Model $model = null)
    {
        if(!$file){
            return null;
        }

        if (!$name) {
            $name = time() . str_random(10);
        }

        $name .= '.' . $file->getClientOriginalExtension();

        $file->move('assets/images/' . $folder, $name);

        // if ($model) {
        //     Image::setModel($model)
        //         ->setWidth(100)
        //         ->setSrc(public_path('assets/images/' . $folder.'/'.$name))
        //         ->resize();
        // }

        return $name;
    }

    public function uploadAndDeleteOld($file, $folder, $old_name = null, $name = '', Model $model = null)
    {
        if($old_name)
            $this->delete_file($old_name, $folder);

        return $this->upload($file, $folder, $name, $model);
    }

    public function delete_file($file, $folder)
    {
        $file = public_path("/assets/images/{$folder}/{$file}");

        if (!File::exists($file)) {
            return null;
        }

        File::delete($file);

        return null;
    }

    public function delete_collection($collection, $folder, $key)
    {
        foreach ($collection as $value) {
            $this->delete_file($value->$key, $folder);

            $value->delete();
        }
    }

    public function copy_file($file_name, $source_folder, $destination_folder)
    {
        $source = public_path() . "/assets/images/{$source_folder}/{$file_name}";
        $destination = public_path() . "/assets/images/{$destination_folder}/{$file_name}";

        File::copy($source, $destination);
    }
}