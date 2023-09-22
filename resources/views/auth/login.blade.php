<x-guest-layout>
    
    <div class="flex flex-col justify-between p-8 text-left h-full">
        <div>
            <h1 class="text-3xl font-bold mb-8">{{__('auth.signin')}}</h1>
            
            @include('includes.message')

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('auth.email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('auth.password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4 flex flex-row justify-between">

                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('auth.remember') }}</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('auth.password_forgot') }}
                        </a>
                    @endif
                </div>
                
                <x-button class="">
                    {{ __('auth.signin') }}
                </x-button>
                <p class="mt-2">{{__('auth.dont_have_account')}} <a href="{{route('register')}}" class="text-grayDark bg-honey-300 p-1 px-2 rounded-md " title="">{{__('auth.joinnow')}}</a></p>
            </form>
            
        </div>
        @include('includes.guest-footer')
    </div> 
</x-guest-layout>
