@props(['size' => 'small'])

@php
    $sizeClasses = [
        'compact' => 'h-8 w-[97px] text-base',
        'small' => 'h-10 w-[120px] text-xl',
        'large' => 'h-14 w-full max-w-[300px] text-2xl sm:h-[99px] sm:w-[300px] sm:text-[36px] xl:h-[min(99px,5.156vw)] xl:w-[min(300px,15.625vw)] xl:text-[length:min(36px,1.875vw)]',
    ][$size];
@endphp

<a {{ $attributes->merge(['href' => '#', 'class' => "flex {$sizeClasses} items-center justify-center rounded-[1px] bg-eccentric-blue font-electrolize leading-none whitespace-nowrap text-on-brand"]) }}>
    Book a Call
</a>
