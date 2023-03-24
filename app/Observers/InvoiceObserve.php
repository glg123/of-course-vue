<?php

namespace App\Observers;

use App\Models\Invoice;
use App\Models\FoodStock;
use App\Enums\InvoiceEnum;

class InvoiceObserve
{
    public function created(Invoice $invoice)
    {
        if ($invoice->type == InvoiceEnum::PURCHASE && $invoice->food) {
            FoodStock::create([
                'food_id'=>$invoice->food->id,
                'status'=>0,
                'reference'=>$invoice->id,
                'stock'=>$invoice->qty,
                'price'=>$invoice->price,
                'type'=>$invoice->type,
                'settings'=>[
                    'old_stock'=>$invoice->food->stock,
                    'old_price'=>$invoice->food->price,
                ]
            ]);
        }
    }


}
