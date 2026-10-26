@php
    $socialLinks = [
        ['label' => 'Instagram', 'url' => '#'],
        ['label' => 'LinkedIn', 'url' => '#'],
        ['label' => 'X', 'url' => '#'],
        ['label' => 'Facebook', 'url' => '#'],
    ];

    $legalLinks = [
        ['label' => 'Privacy Policy', 'url' => '#'],
        ['label' => 'Cookies Setting', 'url' => '#'],
    ];
@endphp

<footer class="flex flex-col gap-4 px-4 pb-24 font-electrolize text-base leading-6 text-grey sm:px-8 xl:flex-row xl:items-center xl:justify-between xl:px-[70px] xl:pb-[32px] xl:text-[length:clamp(16px,1.25vw,24px)]">
    <nav class="flex flex-wrap gap-x-6 gap-y-2 xl:gap-x-[clamp(20px,1.5625vw,30px)]" aria-label="Social">
        @foreach ($socialLinks as $link)
            <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
        @endforeach
    </nav>

    <div class="flex flex-wrap gap-x-6 gap-y-2 xl:gap-x-[clamp(20px,1.5625vw,30px)]">
        @foreach ($legalLinks as $link)
            <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
        @endforeach
        <p>&copy; Compiling Logics 2019-{{ now()->year }}</p>
    </div>
</footer>
