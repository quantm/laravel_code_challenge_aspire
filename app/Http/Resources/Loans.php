<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Loans extends JsonResource
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
            'user_id' => $this->user_id,
            'loan_amount' => $this->loan_amount,
            'loan_term' => $this->loan_term,
            'status' => $this->status,
            'approval_status' => $this->approval_status,
            'modified_by' => $this->modified_by,
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y'),
        ];
    }
}
