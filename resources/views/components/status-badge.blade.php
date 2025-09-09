{{-- resources/views/components/status-badge.blade.php --}}
@props(['status'])

@php
    $classes = match ($status) {
        'Published'
            => 'bg-green-100 text-green-800 dark:bg-green-800/30 dark:text-green-400',
        'Drafted'
            => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-800/30 dark:text-yellow-400',
        default
            => 'bg-gray-100 text-gray-800 dark:bg-gray-800/30 dark:text-gray-400',
    };
@endphp

<span
    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $classes }}">
    {{ $slot }}
</span>
