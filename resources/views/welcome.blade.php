<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portfolio</title>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) ||
            file_exists(public_path('hot')))
        @vite(['resources/css/style.css', 'resources/js/app.js'])
    @else
        <style>

        </style>
    @endif
</head>

<body
    class="bg-gray-50 dark:bg-dark100 text-gray-800 dark:text-gray-200 transition-colors duration-300">
    <!-- Header & Navigation -->
    <header class="bg-white dark:bg-dark200 py-4 shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-5 flex justify-between items-center">
            <a href="#"
                class="text-xl font-bold text-blue-600 dark:text-blue-400">Home</a>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                @foreach ($links as $link => $href)
                    <x-welcome.link
                        href="{{ $href }}">{{ $link }}</x-welcome.link>
                @endforeach
            </div>

            <!-- Mobile menu toggle -->
            <div class="md:hidden flex items-center">
                <input class="hidden" type="checkbox" id="menu-toggle" />
                <label for="menu-toggle" class="cursor-pointer">
                    <svg class="w-6 h-6 text-gray-800 dark:text-gray-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </label>
            </div>
        </div>

        <!-- Mobile Navigation - Placed as next sibling to the input -->
        <input class="hidden" type="checkbox" id="menu-toggle" />
        <div class="hidden md:hidden mt-4" id="mobile-menu">
            <div class="container mx-auto px-5 flex flex-col space-y-4 pb-4">
                @foreach ($links as $link => $href)
                    <x-welcome.link
                        href="{{ $href }}">{{ $link }}</x-welcome.link>
                @endforeach
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="about" class="container mx-auto px-5 py-8 md:py-10">
        <div class="text-center max-w-2xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold dark:text-white">
                Mauricio Sousa
            </h1>
            <p class="py-3 text-3xl">
                Laravel backend developer
            </p>
        </div>
        <div class="container mx-auto px-5">
            <div class="grid grid-cols-1 gap-12 items-center">
                <div>
                    <p class="text-lg mb-6 dark:text-gray-300">
                        I'm a dedicated backend developer with 5+ years of
                        experience specializing in Laravel development.
                        I focus on creating efficient, secure, and scalable
                        server-side solutions.
                    </p>
                    <p class="text-lg mb-6 dark:text-gray-300">
                        My expertise includes API development, database design,
                        server management, and implementing
                        complex business logic while maintaining code quality
                        and performance.
                    </p>
                    <p class="text-lg dark:text-gray-300">
                        When I'm not coding, I enjoy contributing to open-source
                        projects, learning new technologies,
                        and sharing knowledge with the developer community.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience section -->
    <section id="experience" class="bg-white dark:bg-dark200 py-8">
        <div class="container mx-auto px-5">
            <h2 class="text-3xl font-bold text-center mb-4 dark:text-white">
                Professional experience
            </h2>

            <div class="grid grid-cols-1 gap-12 items-center">
                <div>
                    <p class="text-lg mb-6 dark:text-gray-300">
                    </p>
                    <p class="text-lg mb-6 dark:text-gray-300">
                    </p>
                    <p class="text-lg dark:text-gray-300">
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-8 bg-white dark:bg-dark100">
        <div class="container mx-auto px-5">
            <h2 class="text-3xl font-bold  text-center mb-4 dark:text-white">
                Backend Projects</h2>
            <p
                class="text-gray-600 dark:text-gray-300 text-center max-w-2xl mx-auto mb-12">
                Here are some of my recent backend development projects
                showcasing my expertise.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse ($projects as $project)
                    <x-welcome.projectcard title="{{ $project->title }}"
                        description="{{ $project->description }}"
                        :tech="$project->get_tech_stack"
                        repository_url="{{ $project->repository_url }}"
                        project_url="{{ $project->project_url }}" />
                @empty
                    <p>Projects</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="skills" class="py-6 bg-gray-50 dark:bg-dark200">
        <div class="container mx-auto px-5">
            <h2 class="text-3xl font-bold text-center mb-4 dark:text-white">
                Technical Skills</h2>
            <p
                class="text-gray-600 dark:text-gray-300 text-center max-w-2xl mx-auto mb-6">
                Here are the technologies and tools I specialize in as a backend
                developer.
            </p>

            <!-- Backend-focused tools -->
            <div class="">
                <div
                    class="flex flex-wrap justify-center gap-6 text-4xl text-gray-700 dark:text-gray-400">
                    <div class="flex flex-col justify-center items-center">
                        <p class="text-[25px]">Laravel</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="60"
                            height="60" preserveAspectRatio="xMidYMid"
                            viewBox="0 0 256 264">
                            <path
                                d="m255.9 59.6.1 1.1v56.6c0 1.4-.8 2.8-2 3.5l-47.6 27.4v54.2c0 1.4-.7 2.8-2 3.5l-99.1 57-.7.4-.3.1c-.7.2-1.4.2-2.1 0l-.4-.1-.6-.3L2 206c-1.3-.8-2.1-2.2-2.1-3.6V32.7l.1-1.1.2-.4.3-.6.2-.4.4-.5.4-.3c.2 0 .3-.2.5-.3L51.6.6c1.3-.8 2.9-.8 4.1 0L105.3 29c.2 0 .3.2.4.3l.5.3c0 .2.2.4.3.5l.3.4.3.6.1.4.2 1v106l41.2-23.7V60.7c0-.4 0-.7.2-1l.1-.4.3-.7.3-.3.3-.5.5-.3.4-.4 49.6-28.5c1.2-.7 2.8-.7 4 0L254 57l.5.4.4.3.4.5.2.3c.2.2.2.5.3.7l.2.3Zm-8.2 55.3v-47l-17.3 10-24 13.7v47l41.3-23.7Zm-49.5 85v-47l-23.6 13.5-67.2 38.4v47.5l90.8-52.3ZM8.2 39.9V200l90.9 52.3v-47.5l-47.5-26.9-.4-.4c-.2 0-.3-.1-.4-.3l-.4-.4-.3-.4-.2-.5-.2-.5v-.6l-.2-.5V63.6L25.6 49.8l-17.3-10Zm45.5-31L12.4 32.8l41.3 23.7 41.2-23.7L53.7 8.9ZM75 157.3l24-13.8V39.8l-17.3 10-24 13.8v103.6l17.3-10ZM202.3 36.9 161 60.7l41.3 23.8 41.3-23.8-41.3-23.8Zm-4.1 54.7-24-13.8-17.3-10v47l24 13.9 17.3 10v-47Zm-95 106 60.6-34.5 30.2-17.3-41.2-23.8-47.5 27.4L62 174.3l41.2 23.3Z"
                                fill="#FF2D20" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-center items-center">
                        <p class="text-[25px]">PHP</p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-white dark:fill-gray-200" width="80"
                            height="60" viewBox="0 -1 100 50">
                            <path
                                d="M7.579 10.123h14.204c4.169.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-.247 1.873-.795 3.71-1.643 5.512a16.385 16.385 0 01-3.392 4.876c-1.767 1.837-3.657 3.003-5.671 3.498a26.11 26.11 0 01-6.254.742h-6.36l-2.014 10.07H0l7.579-38.001m6.201 6.042l-3.18 15.9c.212.035.424.053.636.053h.742c3.392.035 6.219-.3 8.48-1.007 2.261-.742 3.781-3.321 4.558-7.738.636-3.71 0-5.848-1.908-6.413-1.873-.565-4.222-.83-7.049-.795-.424.035-.83.053-1.219.053h-1.113l.053-.053M41.093 0h7.314L46.34 10.123h6.572c3.604.071 6.289.813 8.056 2.226 1.802 1.413 2.332 4.099 1.59 8.056l-3.551 17.649h-7.42L54.979 21.2c.353-1.767.247-3.021-.318-3.763s-1.784-1.113-3.657-1.113l-5.883-.053-4.346 21.783h-7.314L41.093 0M70.412 10.123h14.204c4.169.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-.247 1.873-.795 3.71-1.643 5.512a16.385 16.385 0 01-3.392 4.876c-1.767 1.837-3.657 3.003-5.671 3.498a26.11 26.11 0 01-6.254.742h-6.36L70.2 48.124h-7.367l7.579-38.001m6.201 6.042l-3.18 15.9c.212.035.424.053.636.053h.742c3.392.035 6.219-.3 8.48-1.007 2.261-.742 3.781-3.321 4.558-7.738.636-3.71 0-5.848-1.908-6.413-1.873-.565-4.222-.83-7.049-.795-.424.035-.83.053-1.219.053H76.56l.053-.053" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-center items-center">
                        <p class="text-[25px]">MySQL</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="60"
                            height="60" preserveAspectRatio="xMidYMid"
                            viewBox="0 0 256 252">
                            <path
                                d="M236 194c-14 0-25 1-34 5-3 1-7 1-7 4l3 6c2 3 5 8 9 11l11 8 21 10 11 9 6 4-3-6-5-5c-5-7-11-13-18-18-6-3-18-9-20-15h-1l12-3 18-3 8-2v-2l-9-10c-8-8-18-15-28-22l-18-8c-2-1-6-2-7-4l-7-13-15-30-8-20c-18-30-38-48-68-65-6-4-14-5-22-7l-13-1-8-6C34 5 8-9 1 9c-5 11 7 22 11 28l9 13 3 9c3 8 5 17 9 24l6 10c2 2 4 3 5 6-3 4-3 9-4 13-7 20-4 44 5 59 2 4 9 14 18 10 8-3 6-13 8-22l1-4 8 14c5 9 14 18 22 24 4 3 8 8 13 10l-4-4-9-10c-8-10-14-21-20-32l-7-17-3-6c-3 4-7 7-9 12-3 7-3 17-4 26h-1c-6-1-8-7-10-12-5-12-6-32-1-46 1-4 6-15 4-19-1-3-4-5-6-7l-7-12-10-30-9-13c-3-5-7-8-10-14-1-2-2-5 0-7l2-2c2-2 9 0 11 1 6 3 12 5 17 9l8 6h4c6 1 12 0 17 2 9 3 18 7 25 12 23 14 42 35 54 59 3 4 3 8 5 12l12 26c4 8 7 16 12 23 3 4 14 6 18 8l12 4 18 12c2 2 11 7 12 10Z"
                                fill="#00546B" />
                            <path
                                d="m58 43-7 1 6 7 4 9v-1c3-1 4-4 4-8l-2-4-5-4Z"
                                fill="#00546B" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-center items-center">
                        <p class="text-[25px]">Git</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="60"
                            height="60" preserveAspectRatio="xMidYMid"
                            viewBox="0 0 256 256">
                            <path
                                d="M251.17 116.6 139.4 4.82a16.49 16.49 0 0 0-23.31 0l-23.21 23.2 29.44 29.45a19.57 19.57 0 0 1 24.8 24.96l28.37 28.38a19.61 19.61 0 1 1-11.75 11.06L137.28 95.4v69.64a19.62 19.62 0 1 1-16.13-.57V94.2a19.61 19.61 0 0 1-10.65-25.73L81.46 39.44 4.83 116.08a16.49 16.49 0 0 0 0 23.32L116.6 251.17a16.49 16.49 0 0 0 23.32 0l111.25-111.25a16.5 16.5 0 0 0 0-23.33"
                                fill="#DE4C36" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-center items-center">
                        <p class="text-[25px]">Docker</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="60"
                            height="60" viewBox="0 0 24 24"
                            fill="#008fe2">
                            <path
                                d="M13.98 11.08h2.12a.19.19 0 0 0 .19-.19V9.01a.19.19 0 0 0-.19-.19h-2.12a.18.18 0 0 0-.18.18v1.9c0 .1.08.18.18.18m-2.95-5.43h2.12a.19.19 0 0 0 .18-.19V3.57a.19.19 0 0 0-.18-.18h-2.12a.18.18 0 0 0-.19.18v1.9c0 .1.09.18.19.18m0 2.71h2.12a.19.19 0 0 0 .18-.18V6.29a.19.19 0 0 0-.18-.18h-2.12a.18.18 0 0 0-.19.18v1.89c0 .1.09.18.19.18m-2.93 0h2.12a.19.19 0 0 0 .18-.18V6.29a.18.18 0 0 0-.18-.18H8.1a.18.18 0 0 0-.18.18v1.89c0 .1.08.18.18.18m-2.96 0h2.11a.19.19 0 0 0 .19-.18V6.29a.18.18 0 0 0-.19-.18H5.14a.19.19 0 0 0-.19.18v1.89c0 .1.08.18.19.18m5.89 2.72h2.12a.19.19 0 0 0 .18-.19V9.01a.19.19 0 0 0-.18-.19h-2.12a.18.18 0 0 0-.19.18v1.9c0 .1.09.18.19.18m-2.93 0h2.12a.18.18 0 0 0 .18-.19V9.01a.18.18 0 0 0-.18-.19H8.1a.18.18 0 0 0-.18.18v1.9c0 .1.08.18.18.18m-2.96 0h2.11a.18.18 0 0 0 .19-.19V9.01a.18.18 0 0 0-.18-.19H5.14a.19.19 0 0 0-.19.19v1.88c0 .1.08.19.19.19m-2.92 0h2.12a.18.18 0 0 0 .18-.19V9.01a.18.18 0 0 0-.18-.19H2.22a.18.18 0 0 0-.19.18v1.9c0 .1.08.18.19.18m21.54-1.19c-.06-.05-.67-.51-1.95-.51-.34 0-.68.03-1.01.09a3.77 3.77 0 0 0-1.72-2.57l-.34-.2-.23.33a4.6 4.6 0 0 0-.6 1.43c-.24.97-.1 1.88.4 2.66a4.7 4.7 0 0 1-1.75.42H.76a.75.75 0 0 0-.76.75 11.38 11.38 0 0 0 .7 4.06 6.03 6.03 0 0 0 2.4 3.12c1.18.73 3.1 1.14 5.28 1.14.98 0 1.96-.08 2.93-.26a12.25 12.25 0 0 0 3.82-1.4 10.5 10.5 0 0 0 2.61-2.13c1.25-1.42 2-3 2.55-4.4h.23c1.37 0 2.21-.55 2.68-1 .3-.3.55-.66.7-1.06l.1-.28Z" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-center items-center">
                        <p class="text-[25px]">Linux</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="60"
                            height="60" viewBox="0 0 256 295">
                            <defs>
                                <linearGradient id="linux__logosLinuxTux0"
                                    x1="48.548%" x2="51.047%"
                                    y1="115.276%" y2="41.364%">
                                    <stop offset="0%"
                                        stop-color="#FFEED7" />
                                    <stop offset="100%"
                                        stop-color="#BDBFC2" />
                                </linearGradient>
                                <linearGradient id="linux__logosLinuxTux1"
                                    x1="54.407%" x2="46.175%"
                                    y1="2.404%" y2="90.542%">
                                    <stop offset="0%" stop-color="#FFF"
                                        stop-opacity=".8" />
                                    <stop offset="100%" stop-color="#FFF"
                                        stop-opacity="0" />
                                </linearGradient>
                                <linearGradient id="linux__logosLinuxTux2"
                                    x1="51.86%" x2="47.947%"
                                    y1="88.248%" y2="9.748%">
                                    <stop offset="0%"
                                        stop-color="#FFEED7" />
                                    <stop offset="100%"
                                        stop-color="#BDBFC2" />
                                </linearGradient>
                                <linearGradient id="linux__logosLinuxTux3"
                                    x1="49.925%" x2="49.924%"
                                    y1="85.49%" y2="13.811%">
                                    <stop offset="0%"
                                        stop-color="#FFEED7" />
                                    <stop offset="100%"
                                        stop-color="#BDBFC2" />
                                </linearGradient>
                                <linearGradient id="linux__logosLinuxTux4"
                                    x1="53.901%" x2="45.956%"
                                    y1="3.102%" y2="93.895%">
                                    <stop offset="0%" stop-color="#FFF"
                                        stop-opacity=".65" />
                                    <stop offset="100%" stop-color="#FFF"
                                        stop-opacity="0" />
                                </linearGradient>
                                <linearGradient id="linux__logosLinuxTux5"
                                    x1="45.593%" x2="54.811%"
                                    y1="5.475%" y2="93.524%">
                                    <stop offset="0%" stop-color="#FFF"
                                        stop-opacity=".65" />
                                    <stop offset="100%" stop-color="#FFF"
                                        stop-opacity="0" />
                                </linearGradient>
                                <linearGradient id="linux__logosLinuxTux6"
                                    x1="49.984%" x2="49.984%"
                                    y1="89.845%" y2="40.632%">
                                    <stop offset="0%"
                                        stop-color="#FFEED7" />
                                    <stop offset="100%"
                                        stop-color="#BDBFC2" />
                                </linearGradient>
                                <linearGradient id="linux__logosLinuxTux7"
                                    x1="53.505%" x2="42.746%"
                                    y1="99.975%" y2="23.545%">
                                    <stop offset="0%"
                                        stop-color="#FFEED7" />
                                    <stop offset="100%"
                                        stop-color="#BDBFC2" />
                                </linearGradient>
                                <linearGradient id="linux__logosLinuxTux8"
                                    x1="49.841%" x2="50.241%"
                                    y1="13.229%" y2="94.673%">
                                    <stop offset="0%" stop-color="#FFF"
                                        stop-opacity=".8" />
                                    <stop offset="100%" stop-color="#FFF"
                                        stop-opacity="0" />
                                </linearGradient>
                                <linearGradient id="linux__logosLinuxTux9"
                                    x1="49.927%" x2="50.727%"
                                    y1="37.327%" y2="92.782%">
                                    <stop offset="0%" stop-color="#FFF"
                                        stop-opacity=".65" />
                                    <stop offset="100%" stop-color="#FFF"
                                        stop-opacity="0" />
                                </linearGradient>
                                <linearGradient id="linux__logosLinuxTuxa"
                                    x1="49.876%" x2="49.876%"
                                    y1="2.299%" y2="81.204%">
                                    <stop offset="0%" stop-color="#FFF"
                                        stop-opacity=".65" />
                                    <stop offset="100%" stop-color="#FFF"
                                        stop-opacity="0" />
                                </linearGradient>
                                <linearGradient id="linux__logosLinuxTuxb"
                                    x1="49.833%" x2="49.824%"
                                    y1="2.272%" y2="71.799%">
                                    <stop offset="0%" stop-color="#FFF"
                                        stop-opacity=".65" />
                                    <stop offset="100%" stop-color="#FFF"
                                        stop-opacity="0" />
                                </linearGradient>
                                <linearGradient id="linux__logosLinuxTuxc"
                                    x1="53.467%" x2="38.949%"
                                    y1="48.921%" y2="98.1%">
                                    <stop offset="0%"
                                        stop-color="#FFA63F" />
                                    <stop offset="100%" stop-color="#FF0" />
                                </linearGradient>
                                <linearGradient id="linux__logosLinuxTuxd"
                                    x1="52.373%" x2="47.579%"
                                    y1="143.009%" y2="-64.622%">
                                    <stop offset="0%"
                                        stop-color="#FFEED7" />
                                    <stop offset="100%"
                                        stop-color="#BDBFC2" />
                                </linearGradient>
                                <linearGradient id="linux__logosLinuxTuxe"
                                    x1="30.581%" x2="65.887%"
                                    y1="34.024%" y2="89.175%">
                                    <stop offset="0%"
                                        stop-color="#FFA63F" />
                                    <stop offset="100%" stop-color="#FF0" />
                                </linearGradient>
                                <linearGradient id="linux__logosLinuxTuxf"
                                    x1="59.572%" x2="48.361%"
                                    y1="-17.216%" y2="66.118%">
                                    <stop offset="0%" stop-color="#FFF"
                                        stop-opacity=".65" />
                                    <stop offset="100%" stop-color="#FFF"
                                        stop-opacity="0" />
                                </linearGradient>
                                <linearGradient id="linux__logosLinuxTuxg"
                                    x1="47.769%" x2="51.373%"
                                    y1="1.565%" y2="104.313%">
                                    <stop offset="0%" stop-color="#FFF"
                                        stop-opacity=".65" />
                                    <stop offset="100%" stop-color="#FFF"
                                        stop-opacity="0" />
                                </linearGradient>
                                <linearGradient id="linux__logosLinuxTuxh"
                                    x1="43.55%" x2="57.114%"
                                    y1="4.533%" y2="92.827%">
                                    <stop offset="0%" stop-color="#FFF"
                                        stop-opacity=".65" />
                                    <stop offset="100%" stop-color="#FFF"
                                        stop-opacity="0" />
                                </linearGradient>
                                <linearGradient id="linux__logosLinuxTuxi"
                                    x1="49.733%" x2="50.558%"
                                    y1="17.609%" y2="99.385%">
                                    <stop offset="0%"
                                        stop-color="#FFA63F" />
                                    <stop offset="100%" stop-color="#FF0" />
                                </linearGradient>
                                <linearGradient id="linux__logosLinuxTuxj"
                                    x1="50.17%" x2="49.68%"
                                    y1="2.89%" y2="94.17%">
                                    <stop offset="0%" stop-color="#FFF"
                                        stop-opacity=".65" />
                                    <stop offset="100%" stop-color="#FFF"
                                        stop-opacity="0" />
                                </linearGradient>
                                <filter id="linux__logosLinuxTuxk"
                                    width="200%" height="200%" x="-50%"
                                    y="-50%" filterUnits="objectBoundingBox">
                                    <feOffset in="SourceAlpha"
                                        result="shadowOffsetOuter1" />
                                    <feGaussianBlur in="shadowOffsetOuter1"
                                        result="shadowBlurOuter1"
                                        stdDeviation="6.5" />
                                </filter>
                            </defs>
                            <g fill="none">
                                <path fill="#000" fill-opacity=".2"
                                    d="M235.125 249.359c0 17.355-52.617 31.497-117.54 31.497S.044 266.806.044 249.359c0-17.356 52.618-31.498 117.54-31.498c64.924 0 117.45 14.142 117.541 31.498"
                                    filter="url(#linux__logosLinuxTuxk)"
                                    transform="translate(10)" />
                                <path fill="#000"
                                    d="M63.213 215.474c-11.387-16.346-13.591-69.606 12.947-102.39C89.292 97.383 92.69 86.455 93.7 71.67c.734-16.805-11.846-66.851 35.537-70.616c48.027-3.857 45.364 43.526 45.088 68.596c-.183 21.12 15.52 33.15 26.355 49.68c19.927 30.303 18.274 82.461-3.765 110.745c-27.916 35.354-51.791 20.018-67.678 21.304c-29.752 1.745-30.762 17.54-66.024-35.905" />
                                <path fill="url(#linux__logosLinuxTux0)"
                                    d="M169.1 122.451c8.265 7.622 29.661 41.69-4.224 62.995c-11.937 7.438 10.653 35.721 21.488 22.039c19.193-24.61 6.98-63.913-4.591-77.963c-7.714-9.917-19.651-13.774-12.672-7.07"
                                    transform="translate(10)" />
                                <path fill="#000" stroke="#000"
                                    stroke-width=".977"
                                    d="M176.805 117.86c13.59 11.02 38.292 49.587 2.204 74.748c-11.846 7.806 10.468 32.508 23.049 19.927c43.618-43.894-1.102-94.308-16.53-111.664c-13.774-15.151-25.987 3.49-8.723 16.989z" />
                                <path fill="url(#linux__logosLinuxTux1)"
                                    d="M147.245 25.02c-.459 12.581-14.325 23.51-30.946 24.52c-16.621 1.01-29.66-8.54-29.202-21.121c.46-12.581 14.326-23.509 30.947-24.519c16.62-.918 29.66 8.54 29.201 21.12"
                                    transform="translate(10)" />
                                <path fill="url(#linux__logosLinuxTux2)"
                                    d="M107.483 54.957c.46 8.173-3.397 15.06-8.723 15.335c-5.326.276-10.01-6.06-10.469-14.233c-.459-8.173 3.398-15.06 8.724-15.335c5.326-.276 10.01 6.06 10.468 14.233"
                                    transform="translate(10)" />
                                <path fill="url(#linux__logosLinuxTux3)"
                                    d="M117.125 55.6c.184 9.458 6.337 16.988 13.683 16.805c7.346-.184 13.131-7.99 12.948-17.54c-.184-9.458-6.336-16.988-13.683-16.804c-7.346.183-13.223 8.08-12.948 17.539"
                                    transform="translate(10)" />
                                <path fill="#000"
                                    d="M133.186 57.712c-.092 5.234 2.48 9.458 5.877 9.458c3.306 0 6.153-4.224 6.245-9.366c.091-5.234-2.48-9.459-5.878-9.459c-3.397 0-6.152 4.225-6.244 9.367m-21.212.092c.459 4.316-1.194 7.989-3.582 8.356c-2.387.276-4.683-2.938-5.142-7.254c-.46-4.316 1.194-7.99 3.581-8.357c2.388-.275 4.684 2.939 5.143 7.255" />
                                <path fill="url(#linux__logosLinuxTux4)"
                                    d="M124.564 54.773c-.276 2.939 1.102 5.326 3.03 5.51c1.928.184 3.765-2.112 4.04-4.959c.276-2.938-1.102-5.326-3.03-5.51c-1.928-.183-3.765 2.113-4.04 4.96"
                                    transform="translate(10)" />
                                <path fill="url(#linux__logosLinuxTux5)"
                                    d="M99.953 55.508c.276 2.388-.734 4.5-2.203 4.683c-1.47.184-2.847-1.653-3.123-4.132c-.275-2.388.735-4.5 2.204-4.683c1.47-.184 2.847 1.744 3.122 4.132"
                                    transform="translate(10)" />
                                <path fill="url(#linux__logosLinuxTux6)"
                                    d="M71.027 145.684c6.52-14.785 20.386-40.772 20.662-60.883c0-15.978 47.843-19.835 51.7-3.856c3.856 15.978 13.59 39.853 19.834 51.424c6.245 11.478 24.335 48.118 5.051 80.074c-17.356 28.284-69.973 50.69-98.073-3.856c-9.55-18.917-7.806-42.333.826-62.903"
                                    transform="translate(10)" />
                                <path fill="url(#linux__logosLinuxTux7)"
                                    d="M65.15 134.664c-5.601 10.56-17.172 38.293 11.112 53.445c30.395 16.162 30.303 49.312-6.245 33.517c-33.425-14.233-18.641-71.902-9.274-85.676c6.06-9.642 15.243-21.488 4.407-1.286"
                                    transform="translate(10)" />
                                <path fill="#000" stroke="#000"
                                    stroke-width="1.25"
                                    d="M79.925 122.727c-8.907 14.509-30.211 48.669-1.652 66.484c38.384 23.6 27.548 47.108-7.53 25.895c-49.404-29.568-5.97-89.257 13.774-112.03c22.59-25.529 4.316 4.683-4.592 19.65z" />
                                <path fill="url(#linux__logosLinuxTux8)"
                                    d="M156.428 151.285c0 16.162-15.519 37.1-42.15 36.916c-27.456.183-39.118-20.754-39.118-36.916c0-16.161 18.182-29.293 40.588-29.293c22.498.092 40.68 13.132 40.68 29.293"
                                    transform="translate(10)" />
                                <path fill="url(#linux__logosLinuxTux9)"
                                    d="M141.92 100.504c-.276 16.713-11.204 20.662-24.978 20.662c-13.775 0-23.784-2.48-24.978-20.662c0-11.387 11.203-17.998 24.978-17.998c13.774-.092 24.977 6.52 24.977 17.998"
                                    transform="translate(10)" />
                                <path fill="url(#linux__logosLinuxTuxa)"
                                    d="M58.63 126.216c9-13.682 28.008-34.711 3.582 2.939c-19.835 31.038-7.346 50.965-.918 56.474c18.549 16.53 17.814 27.64 3.214 18.917c-31.314-18.641-24.794-50.047-5.878-78.33"
                                    transform="translate(10)" />
                                <path fill="url(#linux__logosLinuxTuxb)"
                                    d="M188.936 131.818c-7.806-16.07-32.6-56.842 1.193-9.459c30.763 42.884 9.183 72.729 5.326 75.667c-3.856 2.939-16.804 8.908-13.04-1.469c3.858-10.377 22.958-30.028 6.52-64.74"
                                    transform="translate(10)" />
                                <path fill="url(#linux__logosLinuxTuxc)"
                                    stroke="#E68C3F" stroke-width="6.25"
                                    d="M51.835 258.542c-20.57-10.928-50.414 2.112-39.578-27.457c2.204-6.704-3.214-16.805.275-23.325c4.133-7.989 13.04-6.244 18.366-11.57c5.234-5.51 8.54-15.06 18.366-13.59c9.734 1.468 16.254 13.406 23.049 28.099c5.05 10.468 22.865 25.253 21.672 37.007c-1.47 17.998-21.948 21.396-42.15 10.836z"
                                    transform="translate(10)" />
                                <path fill="url(#linux__logosLinuxTuxd)"
                                    d="M201.608 189.119c-3.122 5.877-16.162 15.335-24.886 12.856c-8.815-2.388-12.856-15.795-11.111-25.988c1.653-11.386 11.111-12.03 23.05-6.336c12.855 6.336 16.712 11.662 12.947 19.468"
                                    transform="translate(10)" />
                                <path fill="url(#linux__logosLinuxTuxe)"
                                    stroke="#E68C3F" stroke-width="6.251"
                                    d="M194.445 253.49c15.06-18.273 48.578-14.508 25.988-39.577c-4.775-5.418-3.306-16.989-9.183-21.947c-6.887-6.061-14.509-1.102-21.488-4.224c-6.979-3.398-14.325-9.918-22.865-5.327c-8.54 4.684-9.459 16.805-10.285 32.783c-.735 11.479-11.203 30.671-5.602 41.231c8.081 16.346 29.11 14.142 43.435-2.938z"
                                    transform="translate(10)" />
                                <path fill="url(#linux__logosLinuxTuxf)"
                                    d="M187.925 229.064c23.325-34.435 5.97-34.16.092-36.823c-5.877-2.755-12.03-8.173-18.916-4.408c-6.888 3.857-7.255 13.775-7.439 26.814c-.275 9.367-8.08 25.07-3.397 33.793c5.693 10.193 19.467-4.591 29.66-19.376"
                                    transform="translate(10)" />
                                <path fill="url(#linux__logosLinuxTuxg)"
                                    d="M47.06 234.023c-34.895-22.59-18.55-30.303-13.315-33.885c6.336-4.591 6.428-13.407 14.233-12.58c7.806.826 12.397 10.468 17.631 22.406c3.857 8.54 17.264 19.927 16.254 29.753c-1.285 11.57-19.743 3.948-34.803-5.694"
                                    transform="translate(10)" />
                                <path fill="#000"
                                    d="M209.588 188.843c-2.755 4.776-13.958 12.306-21.396 10.285c-7.622-1.928-11.112-12.672-9.55-20.753c1.377-9.183 9.55-9.642 19.834-5.05c10.928 4.958 14.326 9.182 11.112 15.518" />
                                <path fill="url(#linux__logosLinuxTuxh)"
                                    d="M192.058 186.18c-1.745 3.306-9.091 8.54-14.234 7.163c-5.142-1.377-7.713-8.815-6.887-14.417c.735-6.336 6.244-6.704 13.223-3.581c7.53 3.49 9.918 6.428 7.898 10.835"
                                    transform="translate(10)" />
                                <path fill="url(#linux__logosLinuxTuxi)"
                                    stroke="#E68C3F" stroke-width="3.75"
                                    d="M97.107 66.344c3.673-3.398 12.58-13.774 29.477-2.939c3.122 2.02 5.693 2.204 11.662 4.775c12.03 4.96 6.336 16.897-6.52 20.937c-5.51 1.745-10.468 8.449-20.386 7.806c-8.54-.46-10.744-6.06-15.978-9.091c-9.275-5.234-10.652-12.305-5.602-16.07c5.051-3.765 6.98-5.143 7.347-5.418z"
                                    transform="translate(10)" />
                                <path stroke="#E68C3F" stroke-width="2.5"
                                    d="M148.43 75.986c-5.05.275-15.979 11.203-27.457 11.203c-11.479 0-18.366-10.652-20.11-10.652" />
                                <path fill="url(#linux__logosLinuxTuxj)"
                                    d="M102.8 65.426c1.837-1.653 7.622-6.153 15.244-1.562c1.653.919 3.306 1.929 5.693 3.306c4.867 2.847 2.48 6.98-3.398 9.55c-2.663 1.102-7.07 3.49-10.376 3.306c-3.673-.367-6.153-2.755-8.54-4.316c-4.5-2.938-4.224-5.418-2.112-7.346c1.56-1.47 3.305-2.847 3.49-2.938"
                                    transform="translate(10)" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-6 bg-gray-50 dark:bg-dark100">
        <div class="container mx-auto px-5">
            <h2 class="text-3xl font-bold text-center mb-4 dark:text-white">
                Get in touch
            </h2>
            <p
                class="text-gray-600 dark:text-gray-300 text-center max-w-2xl mx-auto mb-12">
                <!-- TODO: change this -->
                I'm currently available for freelance projects and open to
                full-time opportunities.
                Feel free to reach out if you need backend development
                expertise.
            </p>

            <div
                class="grid grid-cols-1 md:grid-cols-1 gap-10 max-w-4xl mx-auto">
                <div>
                    <form class="space-y-6">
                        <div>
                            <label for="name"
                                class="block mb-2 font-medium dark:text-gray-300">
                                Your Name
                            </label>
                            <input type="text" id="name"
                                class="w-full px-4 py-3 rounded border border-gray-300 dark:border-gray-700 bg-white dark:bg-dark300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:text-gray-300"
                                placeholder="Enter your name">
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 font-medium dark:text-gray-300">Your
                                Email</label>
                            <input type="email" id="email"
                                class="w-full px-4 py-3 rounded border border-gray-300 dark:border-gray-700 bg-white dark:bg-dark300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:text-gray-300"
                                placeholder="Enter your email">
                        </div>
                        <div>
                            <label for="message"
                                class="block mb-2 font-medium dark:text-gray-300">Your
                                Message</label>
                            <textarea id="message" rows="4"
                                class="w-full px-4 py-3 rounded border border-gray-300 dark:border-gray-700 bg-white dark:bg-dark300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:text-gray-300"
                                placeholder="Enter your message"></textarea>
                        </div>
                        <button type="submit"
                            class="bg-blue-600 dark:bg-blue-700 text-white px-6 py-3 rounded font-medium hover:bg-blue-700 dark:hover:bg-blue-600 transition-colors w-full">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 dark:bg-dark200 text-white py-8 text-center">
        <div class="container mx-auto px-5">
            <div class="flex justify-center items-center gap-4">
                <p>MIT LICENSE</p>
                <div class="flex justify-center items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15"
                        height="15" viewBox="0 49.4 512 399.42">
                        <g fill="none" fill-rule="evenodd">
                            <g fill-rule="nonzero">
                                <path fill="#4285f4"
                                    d="M34.91 448.818h81.454V251L0 163.727V413.91c0 19.287 15.622 34.91 34.91 34.91z" />
                                <path fill="#34a853"
                                    d="M395.636 448.818h81.455c19.287 0 34.909-15.622 34.909-34.909V163.727L395.636 251z" />
                                <path fill="#fbbc04"
                                    d="M395.636 99.727V251L512 163.727v-46.545c0-43.142-49.25-67.782-83.782-41.891z" />
                            </g>
                            <path fill="#ea4335"
                                d="M116.364 251V99.727L256 204.455 395.636 99.727V251L256 355.727z" />
                            <path fill="#c5221f" fill-rule="nonzero"
                                d="M0 117.182v46.545L116.364 251V99.727L83.782 75.291C49.25 49.4 0 74.04 0 117.18z" />
                        </g>
                    </svg>
                    <p class="dark:text-gray-300">
                        john.doe@example.com</p>
                </div>
                <div class="flex justify-center items-center gap-2">
                    <svg width="15" height="15" class="fill-none dark:fill-white"
                        viewBox="0 0 1024 1024"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8 0C3.58 0 0 3.58 0 8C0 11.54 2.29 14.53 5.47 15.59C5.87 15.66 6.02 15.42 6.02 15.21C6.02 15.02 6.01 14.39 6.01 13.72C4 14.09 3.48 13.23 3.32 12.78C3.23 12.55 2.84 11.84 2.5 11.65C2.22 11.5 1.82 11.13 2.49 11.12C3.12 11.11 3.57 11.7 3.72 11.94C4.44 13.15 5.59 12.81 6.05 12.6C6.12 12.08 6.33 11.73 6.56 11.53C4.78 11.33 2.92 10.64 2.92 7.58C2.92 6.71 3.23 5.99 3.74 5.43C3.66 5.23 3.38 4.41 3.82 3.31C3.82 3.31 4.49 3.1 6.02 4.13C6.66 3.95 7.34 3.86 8.02 3.86C8.7 3.86 9.38 3.95 10.02 4.13C11.55 3.09 12.22 3.31 12.22 3.31C12.66 4.41 12.38 5.23 12.3 5.43C12.81 5.99 13.12 6.7 13.12 7.58C13.12 10.65 11.25 11.33 9.47 11.53C9.76 11.78 10.01 12.26 10.01 13.01C10.01 14.08 10 14.94 10 15.21C10 15.42 10.15 15.67 10.55 15.59C13.71 14.53 16 11.53 16 8C16 3.58 12.42 0 8 0Z"
                            transform="scale(64)" />
                    </svg>
                    <!-- TODO: Add link to my GitHub profile -->
                    <a href="https://github.com/MauSousa"
                        class="dark:text-gray-300">
                        github.com/MauSousa</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Fix for mobile menu toggle -->
    <script>
        // Simple script to handle mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');

            if (menuToggle && mobileMenu) {
                menuToggle.addEventListener('change', function() {
                    if (this.checked) {
                        mobileMenu.classList.remove('hidden');
                    } else {
                        mobileMenu.classList.add('hidden');
                    }
                });
            }

            // Close menu when clicking on links
            const menuLinks = document.querySelectorAll('#mobile-menu a');
            menuLinks.forEach(link => {
                link.addEventListener('click', function() {
                    menuToggle.checked = false;
                    mobileMenu.classList.add('hidden');
                });
            });
        });
    </script>
</body>

</html>
