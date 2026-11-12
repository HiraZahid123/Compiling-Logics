<?php

namespace App\Http\Requests;

use App\Rules\Recaptcha;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactMessageRequest extends FormRequest
{
    /**
     * Industries a visitor can pick on the Work page form, keyed by submitted value.
     *
     * @var array<string, string>
     */
    public const INDUSTRIES = [
        'healthcare' => 'Healthcare',
        'real-estate' => 'Real Estate',
        'hospitality' => 'Hospitality',
        'legal' => 'Legal',
        'education' => 'Education',
        'industrial' => 'Industrial',
        'fintech' => 'Fintech & Banking',
        'ecommerce' => 'Retail & E-commerce',
        'other' => 'Other',
    ];

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
            'industry' => ['nullable', Rule::in(array_keys(self::INDUSTRIES))],
            'return_to' => ['nullable', Rule::in(['services', 'work'])],
            'g-recaptcha-response' => Rule::when(
                filled(config('services.recaptcha.secret_key')),
                ['required', 'string', new Recaptcha],
                ['exclude'],
            ),
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'g-recaptcha-response.required' => 'Please confirm you\'re not a robot.',
        ];
    }

    /**
     * Get the message text, prefixed with any pillars or industry the visitor picked.
     */
    public function messageWithContext(): string
    {
        $context = array_filter([
            $this->array('pillars') === [] ? null : 'Pillars of interest: '.implode(', ', $this->array('pillars')),
            $this->filled('industry') ? 'Industry: '.self::INDUSTRIES[$this->string('industry')->toString()] : null,
        ]);

        return $context === []
            ? $this->string('message')->toString()
            : implode("\n", $context)."\n\n".$this->string('message');
    }
}
