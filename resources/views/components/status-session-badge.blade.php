@props(['status'])

@if ($status)
    <div
        {{ $attributes->merge(['class' => 'font-medium text-xl text-green-600 dark:text-gray-200 dark:bg-cyan-700']) }}>
        {{ $status }}
    </div>
@endif
