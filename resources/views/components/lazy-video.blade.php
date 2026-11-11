@props(['src', 'poster' => null])

<video {{ $attributes->merge(['class' => 'size-full object-cover']) }} data-lazy-video data-src="{{ $src }}" @if ($poster) poster="{{ $poster }}" @endif preload="none" muted loop playsinline aria-hidden="true"></video>
