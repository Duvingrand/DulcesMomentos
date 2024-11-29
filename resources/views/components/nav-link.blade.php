@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-pink-400 text-sm font-medium leading-5 text-pink-600 focus:outline-none focus:border-pink-500 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-pink-500 hover:text-pink-600 hover:border-pink-300 focus:outline-none focus:text-pink-600 focus:border-pink-400 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
