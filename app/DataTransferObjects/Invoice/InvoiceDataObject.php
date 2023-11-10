<?php 

declare(strict_types = 1);

namespace App\DataTransferObjects\Invoice;

class InvoiceDataObject
{

    public function __construct( 
        private  readonly string $totalVat,
        private readonly string $total_excluding_vat
    ){}

    public function toArray() : array
    {
          return [
                 'total_vat'=>$this->totalVat,
                 'total_price_excluding_vat'=>$this->total_excluding_vat
          ];
    }
}