@props(['active'])

@php
$classes = ($active ?? false)
            ? 'pl-3 pr-4 py-2 bg-gray-500 text-base font-medium text-blue-700 bg-gray-100 focus:outline-none focus:text-indigo-800 focus:bg-indigo-200 focus:border-indigo-700 transition duration-150 ease-in-out rounded-lg'
            : 'pl-3 pr-4 py-2 text-base font-medium text-blue-600 hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-500 focus:border-gray-300 transition duration-150 ease-in-out rounded-lg';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
