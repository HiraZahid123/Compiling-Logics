@props(['theme' => 'light'])

@if (filled(config('services.recaptcha.site_key')))
    @once
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endonce

    <div {{ $attributes->merge(['class' => 'g-recaptcha']) }} data-sitekey="{{ config('services.recaptcha.site_key') }}" data-theme="{{ $theme }}"></div>
@endif
