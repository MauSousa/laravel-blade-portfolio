<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portfolio</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600"
        rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) ||
            file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>

        </style>
    @endif
</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6">
        {{-- <h1>Personal Portfolio</h1> --}}
    </header>
    <div
        class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main>
            <h1>Personal Portfolio</h1>
            @forelse ($projects as $project)
                <x-card>
                    <x-slot name="header">
                        <h3
                            class="text-lg font-medium text-gray-800 dark:text-gray-200">
                            {{ $project->title }}
                        </h3>
                    </x-slot>
                    <p>{{ $project->description }}
                    </p>
                    {{ $project->technologies }}
                    <section class="flex">
                        <a href="{{ $project->repository_url }}">
                            Link to
                            repository
                        </a>
                        <a href="{{ $project->project_url }}">
                            Link to site
                        </a>
                    </section>
                    <span>
                        {{ $project->published_status }}
                    </span>
                </x-card>
            @empty
                No projects found
            @endforelse

            <x-card>
                <x-slot name="header">
                    <h3
                        class="text-lg font-medium text-gray-800 dark:text-gray-200">
                        Card with Header
                    </h3>
                </x-slot>

                <p class="text-gray-600 dark:text-gray-400">
                    Card content goes
                    here.</p>

                <x-slot name="footer">
                    <div class="flex justify-end">
                        <x-button>Action</x-button>
                    </div>
                </x-slot>
            </x-card>
        </main>
    </div>

</body>

</html>
