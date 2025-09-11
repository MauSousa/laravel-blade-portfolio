<x-layouts.app>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
            {{ __('Create a new project') }}
        </h1>
    </div>

    <hr>

    <form method="POST" action="{{ route('project.store') }}" class="space-y-3">
        @csrf

        <section class="grid grid-cols-2 gap-3 mt-5">
            <!-- Title Input -->
            <div class="mt-3">
                <x-forms.input label="Title" name="title" type="text"
                    placeholder="Project Title" required autofocus />
            </div>

            <!-- Technologies Input -->
            <div class="mt-3">
                <x-forms.input label="Technologies" name="technologies"
                    type="text" placeholder="Tech stack" />
            </div>

            <!-- Repository Input -->
            <div class="mt-3">
                <x-forms.input label="Repository url" name="repository_url"
                    type="url" placeholder="Repository url" />
            </div>

            <!-- Website Input -->
            <div class="mt-3">
                <x-forms.input label="Website url" name="project_url"
                    type="url" placeholder="Website url" />
            </div>

            <!-- Features Input -->
            <div class="mt-3">
                <x-forms.input label="Features" name="features" type="text"
                    placeholder="Features" />
            </div>

            <!-- Textarea Input -->
            <div class="mt-3 col-span-2">
                <x-forms.textarea cols="40" rows="5"
                    label="Description" name="description"
                    placeholder="Project Description" />
            </div>

        </section>
        <x-button type="primary" class="w-1/3">
            {{ __('Create') }}
        </x-button>
    </form>

</x-layouts.app>
