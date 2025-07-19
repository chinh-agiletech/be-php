<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoucherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'voucher_code' => $this->code,
            'voucher_discount' => $this->discount,
            'voucher_quantity' => $this->valid_from,
            'voucher_start_date' => $this->valid_until,
            'voucher_end_date' => $this->status,
            'voucher_status' => $this->created_at,
        ];
    }
}
