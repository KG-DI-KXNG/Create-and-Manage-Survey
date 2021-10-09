<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css"> 

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            {{-- @include('layouts.navigation') --}}

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-8xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex-grow space-x-8 justify-items-end">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <div class="absolute top-2 bg-gray-00 rounded-full right-0 m-2 z-50 my-auto h-auto w-18 p-2">
            <button class="js-change-theme focus:outline-none">🌙</button>
          </div>
    </body>
    <script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@4"></script>
    <script>
        //Init tooltips
        tippy('.link',{
          placement: 'bottom'
        })

        //Toggle mode
        const toggle = document.querySelector('.js-change-theme');
        const body = document.querySelector('#body');
        const select = document.querySelector('select');
        const profile = document.getElementById('profile');
        const input = document.querySelectorAll('input');
        
        
        toggle.addEventListener('click', () => {

          if (body.classList.contains('text-gray-900')) {
            toggle.innerHTML = "☀️";
            body.classList.remove('text-gray-900');
            input.forEach(element => {
                element.classList.add('bg-gray-900');
            });
            select.classList.add('bg-gray-900','text-gray-100');
            body.classList.add('text-gray-100');
            profile.classList.remove('bg-white');
            profile.classList.add('bg-gray-900');
          } else
          {
            toggle.innerHTML = "🌙";
            input.forEach(element => {
                element.classList.remove('bg-gray-900');
            });
            select.classList.remove('bg-gray-900','text-gray-100');
            body.classList.remove('text-gray-100');
            body.classList.add('text-gray-900');
            profile.classList.remove('bg-gray-900');			
            profile.classList.add('bg-white');
            
          }
        });
        
    </script>
</html>
