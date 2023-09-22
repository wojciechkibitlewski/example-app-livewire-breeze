<x-guest-layout>
    
    <div class="flex flex-col justify-between p-8 text-left h-full">
        <div>
            <h1 class="text-3xl font-bold text-center mb-8">{{__('auth.reset_h1')}}</h1>

            @include('includes.message')
            
            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">                

                <div class="block">
                    <x-label for="email" value="{{ __('auth.email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('auth.password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('auth.confirm_password') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <x-button>
                    {{ __('auth.reset_h1') }}
                </x-button>
            </form>
        </div>
        @include('includes.guest-footer')
    </div> 
</x-guest-layout>
