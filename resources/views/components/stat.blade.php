@props(['value', 'label'])

<p {{ $attributes->merge(['class' => 'text-center font-electrolize leading-[normal]']) }}>
    <span class="block text-[64px] leading-none text-eccentric-blue xl:text-[length:min(96px,5vw)]">{{ $value }}</span>
    <span class="block text-xl leading-[1.25] text-black sm:text-[28px] xl:text-[length:min(36px,1.875vw)]">{{ $label }}</span>
</p>
