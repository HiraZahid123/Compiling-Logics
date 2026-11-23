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
     * Deployment windows a visitor can pick on the Contact page form, keyed by submitted value.
     *
     * @var array<string, string>
     */
    public const TIMELINES = [
        'immediate' => 'Immediate Dispatch (Under 30 Days)',
        'quarter' => 'Q2 Strategic Implementation (60–90 Days)',
        'longterm' => 'Enterprise Modernization (6+ Months)',
        'audit' => 'Architecture Audit & Feasibility Only',
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
            'company_domain' => ['nullable', 'string', 'max:255'],
            'target_metric' => ['nullable', 'string', 'max:500'],
            'tech_stack' => ['nullable', 'string', 'max:500'],
            'timeline' => ['nullable', Rule::in(array_keys(self::TIMELINES))],
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
     * Get the message text, prefixed with any project details the visitor gave (company, pillars, industry, target, stack and timeline).
     */
    public function messageWithContext(): string
    {
        $context = array_filter([
            $this->filled('company_domain') ? 'Company domain: '.$this->string('company_domain') : null,
            $this->array('pillars') === [] ? null : 'Pillars of interest: '.implode(', ', $this->array('pillars')),
            $this->filled('industry') ? 'Industry: '.self::INDUSTRIES[$this->string('industry')->toString()] : null,
            $this->filled('target_metric') ? 'Bottleneck / target metric: '.$this->string('target_metric') : null,
            $this->filled('tech_stack') ? 'Existing architecture & stack: '.$this->string('tech_stack') : null,
            $this->filled('timeline') ? 'Deployment target window: '.self::TIMELINES[$this->string('timeline')->toString()] : null,
        ]);

        return $context === []
            ? $this->string('message')->toString()
            : implode("\n", $context)."\n\n".$this->string('message');
    }
}
