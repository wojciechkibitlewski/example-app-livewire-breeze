<x-guest-layout>
    
    <div class="flex flex-col justify-between p-8 text-left h-full">
        <div>
            <h1 class="text-3xl font-bold text-center mb-8">{{__('auth.verify_h1')}}</h1>
           
            @include('includes.message')

            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('auth.verify_p1') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('auth.verify_p2') }}
                </div>
            @endif

            <div class="mt-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-button type="submit">
                            {{ __('auth.verify_resent') }}
                        </x-button>
                    </div>
                </form>

                <div class="text-center mt-6">
                    <a
                        href="{{ route('profile.show') }}"
                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    >
                        {{ __('auth.edit_profile') }}</a>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf

                        <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 ml-2">
                            {{ __('auth.logout') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @include('includes.guest-footer')
    </div> 
</x-guest-layout>
