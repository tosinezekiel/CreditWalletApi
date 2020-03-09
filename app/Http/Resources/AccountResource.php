<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'dob' => $this->dob,
            'gender' => $this->gender,
            'amount' => $this->amount,
            'duration' => $this->duration,
            'phone' => $this->phone,
            'city' => $this->city,
            'state' => $this->state,
            'employer_name' => $this->employer_name,
            'ippis' => $this->ippis_no,
            'salary_bank_name' => $this->salary_bank_name,
            'salary_account_no' => $this->salary_account_no
        ];
    }
}
