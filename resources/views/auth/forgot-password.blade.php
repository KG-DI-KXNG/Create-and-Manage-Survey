<x-guest-layout>
  <div class="flex right-1 top-1  flex-row-reverse lg:p-1 lg:top-2 lg:right-2 absolute z-10 bg-gray-500 opacity-6 rounded-lg ">
    <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
        {{__('SignUp')}}
    </x-responsive-nav-link>
  
    <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
        {{__('Login')}}
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
        {{__('Home')}}
    </x-responsive-nav-link>
  </div>
  <div class="min-h-screen flex justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center "
  style="background-image: url(https://images.unsplash.com/photo-1525302220185-c387a117886e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80);">
  <div class="absolute bg-black opacity-50 inset-0 z-0"></div>      

        <div class="mb-4 p-4 w-2/4 rounded-md text-sm z-20 bg-white text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mt-1">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="bg-indigo-500">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
          </div>
        </form>
      </div>
</x-guest-layout>
