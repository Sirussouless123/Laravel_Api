<?php 

declare(strict_types = 1);

namespace App\Actions\Invoice;

use App\Models\Invoice;

class StoreInvoiceAction 
{
    public function handle($invoiceNumber,$userId,$total_vat,$total_price_excluding_vat) : void
    {
           Invoice::create([
             'invoice_number'=>$invoiceNumber,
             'total_vat'=>$total_vat,
             'total_price_excluding_vat'=>$total_price_excluding_vat,
              'total_price'=> (float) $total_vat + (float) $total_price_excluding_vat,
             'user_id'=>$userId
           ]);
    }
}