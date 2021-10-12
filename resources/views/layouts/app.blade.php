<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Survey') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css"> 

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

        <!-- JavaScript -->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireStyles

        <style>
            .table {
                border-spacing: 0 15px;
            }
        
            i {
                font-size: 1rem !important;
            }
        
            .table tr {
                border-radius: 20px;
            }
        
            tr td:nth-child(n+7),
            tr th:nth-child(n+7) {
                border-radius: 0 .625rem .625rem 0;
            }
        
            tr td:nth-child(1),
            tr th:nth-child(1) {
                border-radius: .625rem 0 0 .625rem;
            }
            .custom-btn {
            width: 130px;
            height: 40px;
            color: #fff;
            border-radius: 5px;
            padding: 10px 25px;
            font-family: 'Lato', sans-serif;
            font-weight: 500;
            background: transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
            box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
            7px 7px 20px 0px rgba(0,0,0,.1),
            4px 4px 5px 0px rgba(0,0,0,.1);
            outline: none;
            }

                    /* 3 */
            .btn-3 {
            background: linear-gradient(0deg, rgb(13, 172, 97) 0%, rgb(97, 202, 83) 100%); 
            width: 130px;
            height: 40px;
            line-height: 42px;
            padding: 0;
            border: none;
            
            }
            .btn-3 span {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            }
            .btn-3:before,
            .btn-3:after {
            position: absolute;
            content: "";
            right: 0;
            top: 0;
            background: rgba(22, 128, 8);
            transition: all 0.3s ease;
            }
            .btn-3:before {
            height: 0%;
            width: 2px;
            }
            .btn-3:after {
            width: 0%;
            height: 2px;
            }
            .btn-3:hover{
            background: transparent;
            box-shadow: none;
            }
            .btn-3:hover:before {
            height: 100%;
            }
            .btn-3:hover:after {
            width: 100%;
            }
            .btn-3 span:hover{
            color: rgb(13, 172, 97);
            }
            .btn-3 span:before,
            .btn-3 span:after {
            position: absolute;
            content: "";
            left: 0;
            bottom: 0;
            background: rgba(87, 196, 73);
            transition: all 0.3s ease;
            }
            .btn-3 span:before {
            width: 2px;
            height: 0%;
            }
            .btn-3 span:after {
            width: 0%;
            height: 2px;
            }
            .btn-3 span:hover:before {
            height: 100%;
            }
            .btn-3 span:hover:after {
            width: 100%;
            }

            #tableSend {
                display: none;
                z-index: 1;
                position: absolute;
                padding: 1rem 2rem;
                margin-left: 100px;
                margin-top:-35px;
                /* background: red; */

            }
            #tableRow:hover #tableSend {
                display: table-cell;
            }
            /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

            
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen justify-item-center bg-gray-100">
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
    @livewireScripts
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
            if(document.body.contains(select)){
                select.classList.add('bg-gray-900','text-gray-100');
            }   
            body.classList.add('text-gray-100');
            profile.classList.remove('bg-white');
            profile.classList.add('bg-gray-900');
          } else
          {
            toggle.innerHTML = "🌙";
            input.forEach(element => {
                element.classList.remove('bg-gray-900');
            });
            if(document.body.contains(select)){
                select.classList.remove('bg-gray-900','text-gray-100');
            }
            body.classList.remove('text-gray-100');
            body.classList.add('text-gray-900');
            profile.classList.remove('bg-gray-900');			
            profile.classList.add('bg-white');
            
          }
        });

        function closeModal(){
            window.location.href = "/surveytotest";
        }
        
    </script>
</html>
