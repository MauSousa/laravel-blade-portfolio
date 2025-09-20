@props(['href' => '#'])

<a href="{{ $href }}"
    class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">{{ $slot }}</a>
