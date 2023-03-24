<?php

namespace App\Repositories;

use App\Helpers\UploadHelper;
use App\Models\Setting;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class SettingRepository extends AbstractRepository
{
    use UploadHelper;
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Setting::class;

    public function updateSettings(array $attributes)
    {
        
        foreach ($attributes as $key => $value) {
            $value['value'] = $this->updateFile($value);
            $this->getModel()->where([
                'unique_key'=>$key,
            ])->update($value);
        }
    }

    public function updateFile(array $value = [])
    {
        return is_file($value['value']) ? $this->upload($value['value'],lcfirst(class_basename($this->getModel()))) : $value['value'];
    }

    public function handlePaymentSetting(array $attributes):array
    {
        if (!request()->has('general_payment_transfer')) {
            
            $attributes = array_merge($attributes, ['general_payment_transfer'=>['value'=>false]]);
        }
        if (!request()->has('general_payment_credit')) {
            
            $attributes = array_merge($attributes, ['general_payment_credit'=>['value'=>false]]);
        }
        if (!request()->has('general_payment_paypal')) {
            
            $attributes = array_merge($attributes, ['general_payment_paypal'=>['value'=>false]]);
        }
        return $attributes;
    }

}