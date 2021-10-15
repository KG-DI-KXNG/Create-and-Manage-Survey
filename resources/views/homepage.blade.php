<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        Survey Project
    </title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" />
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <style>
        .gradient {
            background: linear-gradient(90deg, #33ee22 0%, #6d90ee 100%);
        }
        body {
        background: rgba(0, 0, 0, 0.9);
        margin: 0;
        color: #fff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .showcase::after {
        content: '';
        height: 100vh;
        width: 100%;
        background-image: url(https://image.ibb.co/gzOBup/showcase.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        display: block;
        filter: blur(10px);
        -webkit-filter: blur(10px);
        transition: all 1000ms;
        }

        .showcase:hover::after {
        filter: blur(0px);
        -webkit-filter: blur(0px);
        }

        /* .showcase:hover .content {
        filter: blur(2px);
        -webkit-filter: blur(2px);
        } */

        .content {
        position: absolute;
        z-index: 1;
        top: 10%;
        left: 25%;
        border-radius: 10px;
        /* display: flex; */
        margin: 0 auto;
        margin-top: 105px; 
        height: 350px;
        text-align: center;
        transition: all 1000ms;
        background-color: rgba(0, 0, 0, 0.7);
        width: 50%;   
        
        }

        .content .title {
        font-size: 4rem;
        margin-top: 1rem;
        /* width: max-content; */
        /* background-color: rgba(0, 0, 0, 0.6); */
        
        }

        .content .text {
        line-height: 1.7;
        margin-top: 1rem;
        /* background-color: rgba(0, 0, 0, 0.6); */
        }

        .container {
        max-width: 960px;
        margin: auto;
        overflow: hidden;
        padding: 4rem 1rem;
        }

        .grid-3 {
        display: grid;
        grid-gap: 20px;
        grid-template-columns: repeat(3, 1fr);
        }

        .grid-2 {
        display: grid;
        grid-gap: 20px;
        grid-template-columns: repeat(2, 1fr);
        }

        .center {
        text-align: center;
        margin: auto;
        }

        .bg-light {
        background: #f4f4f4;
        color: #333;
        }

        .bg-dark {
        background: #333;
        color: #f4f4f4;
        }

        footer {
        padding: 2.2rem;
        }

        footer p {
        margin: 0;
        }

        /* Small Screens */
        @media (max-width: 560px) {
        .showcase::after {
            height: 50vh;
        }

        .content {
            top: 5%;
            margin-top: 5px;
        }

        .content .logo {
            height: 140px;
            width: 140px;
        }

        .grid-3,
        .grid-2 {
            grid-template-columns: 1fr;
        }

        .services div {
            border-bottom: #333 dashed 1px;
            padding: 1.2rem 1rem;
        }
        }

        /* Landscape */
        @media (max-height: 500px) {
        .content .title,
        .content .text {
            display: none;
        }

        .content {
            top: 0;
        }
        }

        

    </style>

    <!--Nav-->
    <nav id="header" class="fixed w-full z-30 top-0 text-white">
        <div class="w-full mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
            <div class="pl-4 flex items-center">
                <a class="toggleColour text-white no-underline hover:no-underline mr-auto font-bold text-2xl lg:text-4xl" href="#">
                    <!--Icon from: http://www.potlabicons.com/ -->

                    <svg class="h-8 fill-current inline" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502" transform="matrix(1,0,0,1,0,0)" />
                        <path fill-rule="evenodd" class="plane-take-off" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                    </svg>

                    Take A Survey
                </a>
            </div>
            <div class="block lg:hidden pr-4">
                <button id="nav-toggle" class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    <li class="mr-3">
                    <a href="{{url('register')}}">

                    <button id="navAction" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out  space-x-4">
                    Register
                    </button>
                    </a>
                    </li>
                    <li class="mr-3">
                    <a href="{{url('login')}}">

                    <button id="navAction" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    Login
                    </button>
                    </a>
                    </li>

                </ul>




            </div>
        </div>
        <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>
</head>

<body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
    
    <!--Hero-->
    <header class="showcase">
        <div class="content items-center ml-auto w-full">
          {{-- <img src="https://image.ibb.co/ims4Ep/logo.png" class="logo" alt="Traversy Media"> --}}
          <div class="title mx-auto font-extrabold">
            Welcome to Amber Survey Management
          </div>
          <div class="text text-2xl">
            A perfect <i class="text-green-500">Survey </i>generates perfect <i class="text-blue-400">Responses</i>
          </div>
        </div>
      </header>
    
      <!-- Services -->
      <section class="services">
        <div class="container grid-3 center">
          <div>
            <i class="fab fa-youtube fa-3x"></i>
            <h3>YouTube</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, reiciendis!</p>
          </div>
          <div>
            <i class="fas fa-chalkboard-teacher fa-3x"></i>
            <h3>Courses</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, reiciendis!</p>
          </div>
          <div>
            <i class="fas fa-briefcase fa-3x"></i>
            <h3>Freelancing Projects</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, reiciendis!</p>
          </div>
        </div>
      </section>
    
      <!-- About -->
      <section class="about bg-light">
        <div class="container">
          <div class="grid-2">
            <div class="center">
              <i class="fas fa-laptop-code fa-10x"></i>
            </div>
            <div>
              <h3>About Us</h3>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non eos aperiam labore consectetur maiores ea magni exercitationem
                similique laborum sed, unde, autem vel iure doloribus aliquid. Aspernatur explicabo consectetur consequatur non
                nesciunt debitis quos alias soluta, ratione, ipsa officia reiciendis.</p>
            </div>
          </div>
        </div>
      </section>
    
      <footer class="center bg-dark">
        <div data-iframe-width="150" data-iframe-height="270" data-share-badge-id="86e22402-a952-4ea3-9bce-5f41be3badf4" data-share-badge-host="https://www.credly.com"></div><script type="text/javascript" async src="//cdn.credly.com/assets/utilities/embed.js"></script>
        <p>KGB Co. ltd. &copy; 2021</p>
      </footer>

    <!--Footer-->

    <!-- jQuery if you need it
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  -->
    <script>
        var scrollpos = window.scrollY;
        var header = document.getElementById("header");
        var navcontent = document.getElementById("nav-content");
        var navaction = document.getElementById("navAction");
        var brandname = document.getElementById("brandname");
        var toToggle = document.querySelectorAll(".toggleColour");

        document.addEventListener("scroll", function() {
            /*Apply classes for slide in bar*/
            scrollpos = window.scrollY;

            if (scrollpos > 10) {
                header.classList.add("bg-white");
                navaction.classList.remove("bg-white");
                navaction.classList.add("gradient");
                navaction.classList.remove("text-gray-800");
                navaction.classList.add("text-white");
                //Use to switch toggleColour colours
                for (var i = 0; i < toToggle.length; i++) {
                    toToggle[i].classList.add("text-gray-800");
                    toToggle[i].classList.remove("text-white");
                }
                header.classList.add("shadow");
                navcontent.classList.remove("bg-gray-100");
                navcontent.classList.add("bg-white");
            } else {
                header.classList.remove("bg-white");
                navaction.classList.remove("gradient");
                navaction.classList.add("bg-white");
                navaction.classList.remove("text-white");
                navaction.classList.add("text-gray-800");
                //Use to switch toggleColour colours
                for (var i = 0; i < toToggle.length; i++) {
                    toToggle[i].classList.add("text-white");
                    toToggle[i].classList.remove("text-gray-800");
                }

                header.classList.remove("shadow");
                navcontent.classList.remove("bg-white");
                navcontent.classList.add("bg-gray-100");
            }
        });
    </script>
    <script>
        /*Toggle dropdown list*/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        document.onclick = check;

        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);

            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, navMenu)) {
                    // click on the link
                    if (navMenuDiv.classList.contains("hidden")) {
                        navMenuDiv.classList.remove("hidden");
                    } else {
                        navMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    navMenuDiv.classList.add("hidden");
                }
            }
        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }
    </script>
</body>

</html>
