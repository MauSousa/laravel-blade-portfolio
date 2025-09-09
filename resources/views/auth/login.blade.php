<x-layouts.auth :title="__('Login')">
    <!-- Login Card -->
    <div
        class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="p-6">
            <div class="mb-3">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                    {{ __('Log in to your account') }}
                </h1>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-3">
                @csrf
                <!-- Email Input -->
                <div>
                    <x-forms.input label="Email" name="email" type="email"
                        placeholder="your@email.com" autofocus />
                </div>

                <!-- Password Input -->
                <div>
                    <x-forms.input label="Password" name="password"
                        type="password" placeholder="••••••••" />
                </div>

                <!-- Login Button -->
                <x-button type="primary"
                    class="w-full">{{ __('Sign In') }}</x-button>
            </form>

        </div>
    </div>
</x-layouts.auth>
