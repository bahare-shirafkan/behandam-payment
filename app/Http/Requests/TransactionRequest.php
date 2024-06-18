<?php

namespace App\Http\Requests;

use App\Rules\ValidCardNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'amount' => ['required', 'gte:1000', 'lte:10000000'],
            'source_card_number' => ['required', 'string', new ValidCardNumber, 'different:destination_card_number'],
            'destination_card_number' => ['required', 'string', new ValidCardNumber],
        ];
    }
}
