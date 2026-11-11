<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactMessageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
            'pillars' => ['nullable', 'array', 'max:6'],
            'pillars.*' => ['string', 'max:100'],
            'return_to' => ['nullable', Rule::in(['services'])],
        ];
    }

    /**
     * Get the message text, prefixed with any service pillars the visitor picked.
     */
    public function messageWithPillars(): string
    {
        $pillars = $this->array('pillars');

        return $pillars === []
            ? $this->string('message')->toString()
            : 'Pillars of interest: '.implode(', ', $pillars)."\n\n".$this->string('message');
    }
}
