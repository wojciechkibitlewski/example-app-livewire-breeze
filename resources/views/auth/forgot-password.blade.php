<x-guest-layout>
    
    <div class="flex flex-col justify-between p-8 text-left h-full">
        <div>
            <h1 class="text-3xl font-bold text-center mb-8">{{__('auth.password_forgot')}}</h1>
            
            @include('includes.message')


            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('auth.forgot_p') }}
            </div>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ session('status') }}
                </div>
            @endif

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="block">
                    <x-label for="email" value="{{ __('auth.email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                
                <x-button class="">
                    {{ __('auth.eprl') }}
                </x-button>
                <p class="mt-2 text-center">{{__('auth.dont_have_account')}} <a href="{{route('register')}}" class="text-gray-400 underline" title="">{{__('auth.joinnow')}}</a></p>

            </form>
            
        </div>
        @include('includes.guest-footer')
    </div> 
</x-guest-layout>
