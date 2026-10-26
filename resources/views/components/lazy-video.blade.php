@props(['src'])

<video {{ $attributes->merge(['class' => 'size-full object-cover']) }} data-lazy-video data-src="{{ $src }}" preload="none" muted loop playsinline aria-hidden="true"></video>
