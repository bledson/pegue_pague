<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMoneyTransferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !$this->user()->isSeller();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'amount' => 'required|min:0',
            'payer' => 'required|integer',
            'payee' => 'required|integer'
        ];
    }
}
