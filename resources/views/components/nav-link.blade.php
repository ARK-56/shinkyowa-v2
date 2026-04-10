@props(['active'])

@php
    $classes =
        $active ?? false
        ? 'flex items-center justify-between w-full px-3 py-2 text-xs font-medium text-[#13274F] bg-white border-white rounded-lg'
        : 'flex items-center justify-between w-full px-3 py-2 text-xs font-medium bg-transparrent border-2 border-white text-white border-white rounded-lg';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>