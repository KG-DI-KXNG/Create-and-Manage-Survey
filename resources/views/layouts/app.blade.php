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
            background: linear-gradient(0deg, rgba(0,172,238,1) 0%, rgba(2,126,251,1) 100%); 
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
            background: rgba(2,126,251,1);
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
            color: rgba(2,126,251,1);
            }
            .btn-3 span:before,
            .btn-3 span:after {
            position: absolute;
            content: "";
            left: 0;
            bottom: 0;
            background: rgba(2,126,251,1);
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
            @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);

            #feedback-page{
                text-align:center;
            }

            #form-div {
                background-color:rgba(72,72,72,0.4);
                padding-left:35px;
                padding-right:35px;
                padding-top:35px;
                padding-bottom:50px;
                width: 550px;
                float: left;
                left: 50%;
                z-index: 1;
                position: absolute;
                margin-top:30px;
                margin-left: -260px;
                -moz-border-radius: 7px;
                -webkit-border-radius: 7px;
            }

            .feedback-input {
                color:#3c3c3c;
                font-family: Helvetica, Arial, sans-serif;
                font-weight:500;
                font-size: 18px;
                border-radius: 0;
                line-height: 22px;
                background-color: #fbfbfb;
                padding: 13px 13px 13px 54px;
                margin-bottom: 10px;
                width:100%;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                -ms-box-sizing: border-box;
                box-sizing: border-box;
            border: 3px solid rgba(0,0,0,0);
            }

            .feedback-input:focus{
                background: #fff;
                box-shadow: 0;
                border: 3px solid #3498db;
                color: #3498db;
                outline: none;
            padding: 13px 13px 13px 54px;
            }

            .focused{
                color:#30aed6;
                border:#30aed6 solid 3px;
            }

            /* Icons ---------------------------------- */
            #name{
                background-image: url(https://icons.getbootstrap.com/assets/icons/person.svg);
                background-size: 30px 30px;
                background-position: 11px 8px;
                background-repeat: no-repeat;
            }

            #name:focus{
                background-image: url(https://icons.getbootstrap.com/assets/icons/person.svg);
                background-size: 30px 30px;
                background-position: 8px 5px;
            background-position: 11px 8px;
                background-repeat: no-repeat;
            }

            #email{
                background-image: url(https://icons.getbootstrap.com/assets/icons/envelope.svg);
                background-size: 30px 30px;
                background-position: 11px 8px;
                background-repeat: no-repeat;
            }

            #email:focus{
                background-image: url(https://icons.getbootstrap.com/assets/icons/envelope.svg);
                background-size: 30px 30px;
            background-position: 11px 8px;
                background-repeat: no-repeat;
            }

            #comment{
                background-image: url(https://icons.getbootstrap.com/assets/icons/link.svg);
                background-size: 30px 30px;
                background-position: 11px 8px;
                background-repeat: no-repeat;
            }
/* 
            textarea {
                width: 100%;
                height: 150px;
                line-height: 150%;
                resize:vertical;
            } */

            #button-blue{
                font-family: 'Montserrat', Arial, Helvetica, sans-serif;
                float:left;
                width: 100%;
                border: #fbfbfb solid 4px;
                cursor:pointer;
                background-color: #00ff62b6;
                color:white;
                font-size:24px;
                padding-top:22px;
                padding-bottom:22px;
                -webkit-transition: all 0.3s;
                -moz-transition: all 0.3s;
                transition: all 0.3s;
            margin-top:-4px;
            font-weight:700;
            }

            #button-blue:hover{
                background-color: rgba(0,0,0,0);
                color: #00ff62b6;
            }
                
            .submit:hover {
                color: #00ff62b6;
            }
                
            .ease {
                width: 0px;
                height: 74px;
                background-color: #fbfbfb;
                -webkit-transition: .3s ease;
                -moz-transition: .3s ease;
                -o-transition: .3s ease;
                -ms-transition: .3s ease;
                transition: .3s ease;
            }

            .submit:hover .ease{
            width:100%;
            background-color:white;
            }

            @media only screen and (max-width: 580px) {
                #form-div{
                    left: 3%;
                    margin-right: 3%;
                    width: 88%;
                    margin-left: 0;
                    padding-left: 3%;
                    padding-right: 3%;
                }
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
        <div class="absolute top-2 bg-gray-300 rounded-full right-0 m-2 z-50 my-auto h-auto w-18 p-2">
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
