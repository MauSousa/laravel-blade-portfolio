<x-layouts.app>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
            {{ __('Dashboard') }}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">
            {{ __('Welcome to the dashboard') }}
        </p>
    </div>

    <div class="">
        {{-- <a href="{{ route('project.create') }}"
            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            {{ __('Create a new project') }}</a> --}}
        <x-link href="{{ route('project.create') }}">
            {{ __('Create a new project') }}
        </x-link>

        <x-data-table :data="$projects" paginated>
            <x-slot name="header">
                <h2 class="text-lg font-medium text-gray-800 dark:text-gray-200">
                    Projects</h2>
            </x-slot>

            <x-slot name="columns">
                <x-table-column field="title">Title</x-table-column>
                <x-table-column
                    field="repository_url">Repository</x-table-column>
                <x-table-column field="project_url">Production</x-table-column>
                <x-table-column field="role">Features</x-table-column>
                <x-table-column field="published">Status</x-table-column>
                <x-table-column>Actions</x-table-column>
            </x-slot>

            <x-slot name="rows">
                @foreach ($projects as $project)
                    <x-table-row>
                        <x-table-cell>{{ $project->title }}</x-table-cell>
                        <x-table-cell>{{ $project->repository_url }}</x-table-cell>
                        <x-table-cell>{{ $project->project_url }}</x-table-cell>
                        <x-table-cell>{{ $project->features }}</x-table-cell>
                        <x-table-cell>
                            <x-status-badge
                                status="{{ $project->published_status }}">{{ $project->published_status }}</x-status-badge>
                        </x-table-cell>
                        <x-table-cell>
                            <x-table-actions :project="$project" />
                        </x-table-cell>
                    </x-table-row>
                @endforeach
            </x-slot>
        </x-data-table>
    </div>

</x-layouts.app>
