<x-guest-layout>

    <div class="flex right-1 top-1  flex-row-reverse lg:p-1 lg:top-2 lg:right-2 absolute z-10 bg-gray-200 ">
      <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
          {{__('SignUp')}}
      </x-responsive-nav-link>
    
      <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
        {{__('Login')}}
    </x-responsive-nav-link>
    </div>
  
    <div class="min-h-screen flex justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
    style="background-image: url(https://images.unsplash.com/photo-1525302220185-c387a117886e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80);">
    <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
  
       <div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl z-10">
                  
        <div class="text-center">
          <h2 class="mt-2 text-3xl font-bold text-gray-900">
            Sign Up
          </h2>
               
          <p class="mt-2 text-sm text-gray-600">Please sign up for your account</p>
        </div>
           <x-auth-validation-errors class="mb-4" :errors="$errors" />
                  
           <form class="mt-8 space-y-6" method="POST" action="{{route('register')}}">
              @csrf            
              <input type="hidden" name="remember" value="true">
                <div class="relative">
                      <div>
                       <label class="text-sm font-bold text-gray-700 tracking-wide">Name</label>
                       <x-input id="name" class="w-full text-base py-2 border-b" type="text" name="name" :value="old('name')" required autofocus />
                     </div>
  
                      <div class="mt-2 content-center">
                        <label class="text-sm font-bold text-gray-700 tracking-wide">Email</label>
                        <x-input id="email" class="block mt-1 w-full border-b" type="email" name="email" :value="old('email')" required />
                      </div>
  
                    <div class="mt-2 content-center">
                      <label class="text-sm font-bold text-gray-700 tracking-wide">Password</label>
                      <x-input id="password" class="block mt-1 w-full border-b" type="password" name="password" required autocomplete="new-password"/> 
                    </div>
  
                    <div class="mt-2 content-center">
                      <label class="text-sm font-bold text-gray-700 tracking-wide">Confirm Password</label>
                      <x-input id="password_confirmation" class="block mt-1 w-full border-b" type="password" name="password_confirmation" required />
                    </div>
  
                    </div>
  
                    <div class="flex items-center justify-between">
                            <x-button class="w-full flex justify-center bg-indigo-500 text-gray-100 p-4 rounded-full tracking-wide
                              font-semibold  focus:outline-none focus:shadow-outline hover:bg-indigo-600 shadow-lg cursor-pointer transition ease-in duration-300">
                              {{ __('Register') }}
                            </x-button>
                    </div>
                    
                    <div class="text-sm">
                      @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{route('login')}}">
                          {{__('Already registered?')}}
                          </a>
                      @endif
                    </div>
                  </form>
                </div>
      </div>
   </x-guest-layout>
  