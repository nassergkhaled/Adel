@props(['active'])

@php
$classes = ($active ?? false)
            ? ' bg-adel-Light-hover text-adel-Normal border-r-4 border-adel-Normal'
            : 'mr-1';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
