<?php

namespace App\Http\Requests\Dashboard\Food;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'qty'      => 'required|numeric',
            'price'      => 'required|numeric',
            'supplier_name' => 'required|min:3',
            'modelable_id' => 'required|exists:foods,id',
            'invoice_id' => 'required|unique:invoices,invoice_id',
        
        ];
    }
}
