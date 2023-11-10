<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Actions\Invoice\StoreInvoiceAction;
use App\Http\Resources\Invoice\InvoiceCollection;
use App\Responses\Invoice\InvoiceCollectionResponse;
use App\DataTransferObjects\Invoice\InvoiceDataObject;


class InvoiceController extends Controller
{
     public function index (Request $request) : InvoiceCollectionResponse
     { 

        return new InvoiceCollectionResponse(Invoice::query()
        ->with(['user',])
        ->where('user_id',$request->user()->id)->paginate(25));

       
    }

    public function store(Request $request)
    {
       
         $invoiceDto = new InvoiceDataObject($request->total_vat,$request->total_price_excluding_vat);

         ( new StoreInvoiceAction)
         ->handle(
            Str::uuid(),
            $request->user()->id,
            ...$invoiceDto->toArray(),
         );

         return new InvoiceCollectionResponse(Invoice::query()
        ->with(['user',])
        ->where('user_id',$request->user()->id)->paginate(25));
    }
}
        
