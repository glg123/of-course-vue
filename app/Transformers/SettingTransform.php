<?php

namespace App\Transformers;

use App\Models\Brand;
use App\Models\Setting;
use League\Fractal\TransformerAbstract;

class SettingTransform extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected  array $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    // protected  array $availableIncludes = [
    //     //
    // ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Setting $setting)
    {
        return [
            "id"=>$setting->id,
            "key"=>$setting->key,
            "value"=>$setting->value,
            "type"=>$setting->type,
            "group"=>$setting->group,
            "lang"=>$setting->lang,
        ];
    }
}
