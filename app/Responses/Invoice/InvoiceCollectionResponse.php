<?php 

declare(strict_types = 1);

namespace App\Responses\Invoice;

use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Support\Responsable;
use App\Http\Resources\Invoice\InvoiceCollection;
use Illuminate\Pagination\LengthAwarePaginator;

class InvoiceCollectionResponse implements Responsable
{


    public function __construct( private readonly Collection|LengthAwarePaginator $collection, private readonly int $status = 200){}

    public function toResponse($collection): JsonResponse
    {
        return response()->json(

            data :    InvoiceCollection::make($this->collection)->response()->getData(),
            status : $this->status,
        );
    }
}