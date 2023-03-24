<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\Invoice;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        Invoice::create([
            'modelable_type'=>Food::class,
            'modelable_id'=>Food::first()->id,
            'type'=>1,
            'status'=>'approved',
            'qty'=>2,
            'price'=>10,
            'invoice_id'=>1541524,
            'supplier_name'=>'mohamed',
        ]);
    }
}
