<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user->id,
            'user_name' => $this->user->name,
            'transaction_code' => $this->transaction_code,
            'amount' => $this->amount,
            'payment_channel' => $this->payment_channel,
            'status' => $this->status,
            'approved_by_id' => $this->approvedBy->name ?? '',
        ];
    }
}
