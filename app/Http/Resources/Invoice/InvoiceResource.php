<?php

namespace App\Http\Resources\Invoice;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'total_price'=>$this->total_price,
            'owner'=> UserResource::make($this->whenLoaded('user')),
        ];
    }
}
