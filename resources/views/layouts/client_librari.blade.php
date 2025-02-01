<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Digital Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Start Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <style>
        .light-color-gradient {
            position: relative;
            background-color: #f5f6f7;
            background-image: linear-gradient(54deg,
                    rgba(255, 131, 122, 0.25),
                    rgba(255, 131, 122, 0) 28%),
                linear-gradient(241deg,
                    rgba(239, 152, 207, 0.25),
                    rgba(239, 152, 207, 0) 36%);
        }
    </style>
     <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}" />
     <link rel="stylesheet" href="{{ asset('assets/css/pdfview.css') }}" />
     <link rel="stylesheet" href="{{ asset('assets/css/audioplayer.css') }}" />
     <link rel="stylesheet" href="{{ asset('assets/css/glightbox.css') }}" />
     <link rel="stylesheet" href="{{ asset('assets/css/no-tailwind.css') }}" />
     <script defer src="{{ asset('assets/js/alpine31.js') }}"></script>
     <script defer src="{{ asset('assets/js/darkMode.js') }}"></script>
     <script defer src="{{ asset('assets/js/flowbite23.js') }} "></script>
     <script defer src="{{ asset('assets/js/pdfPopup.js') }}"></script>
     <script defer src="{{ asset('assets/js/glightbox.js') }}"></script>
     <script defer src="{{ asset('assets/js/glightbox.config.js') }}"></script>
</head>

<body style="font-family: Poppins, Arial, Helvetica, sans-serif">

    <!-- Start Navbar -->
    <nav
        class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-3">
            <a href='/' class="flex items-center  space-x-1 rtl:space-x-reverse">
                <img src={{ asset('assets/images/website_infos/logo.png') }} class="overflow-hidden h-[60px]" />
                <img src={{ asset('assets/images/logo/textLogo.png') }} class="overflow-hidden h-[50px]" />
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse md:hidden">
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-black rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:justify-center md:ite md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href={{ url('/') }} class="{{ request()->is('/')? 'text-blue-800 underline underline-offset-4':'hover:text-blue-800 hover:underline hover:underline-offset-4' }} block py-2 px-3 text-center  md:p-0"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href={{ url('/pricing') }}
                            class="{{ request()->is('pricing')? 'text-blue-800 underline underline-offset-4':'hover:text-blue-800 hover:underline hover:underline-offset-4' }} block py-2 px-3 text-center md:p-0"
                            aria-current="page">Pricing</a>
                        </li>
                    <li class="">
                        <a href={{ url('/learning') }}
                            class="{{ request()->is('learning')? 'text-blue-800 underline underline-offset-4':'hover:text-blue-800 hover:underline hover:underline-offset-4' }} block py-2 px-3 text-center md:p-0">Academy</a>
                    </li>
                    <li class="">
                        <a href={{ url('/support') }}
                            class="{{ request()->is('support')? 'text-blue-800 underline underline-offset-4':'hover:text-blue-800 hover:underline hover:underline-offset-4' }} block py-2 px-3 text-center md:p-0">Support
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    @yield('content')

    <!-- Start Footer -->
    <footer class="light-color-gradient mt-12 p-4 sm:p-6 dark:bg-gray-800">
        <div class="mx-auto max-w-screen-xl">
            <div class="md:flex md:justify-between ">
                <div class="md:mb-0 grid items-center my-3">
                    <a href='/' class="flex items-center  space-x-1 rtl:space-x-reverse">
                        <img src={{ asset('assets/images/website_infos/logo.png') }} class="overflow-hidden h-[60px]" />
                        <img src={{ asset('assets/images/logo/textLogo.png') }} class="overflow-hidden h-[50px]" />
                    </a>
                </div>
                <div>
                    <h2 class="mb-3 text-sm font-semibold uppercase dark:text-white lg:text-center">
                        Social Link
                    </h2>

                    <div class="flex flex-wrap gap-2 mt-4 mb-4 lg:justify-center sm:mt-0 ">
                        @forelse ($links as $item)
                        <a target="_blank" href="{{ $item->link }}" class="hover:text-gray-900 dark:hover:text-white">
                            <img class="h-[55px] aspect-square object-contain rounded-full border border-white hover:scale-110 transition-all"
                                src="{{ asset('assets/images/links/' . $item->image) }}" alt="Telegram" />
                            <span class="sr-only">{{ $item->name }}</span>
                        </a>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
            <hr class="my-3 border-gray-700 sm:mx-auto dark:border-gray-700 lg:my-6" />

            <div class="flex justify-between">
                <span class="text-sm text-gray-700 sm:text-center dark:text-gray-400">{{ $footer->copyright }}
                </span>
                <a href="https://corasolution.com/" class="text-sm hover:underline sm:text-center dark:text-gray-400">
                    Developed By: <span>Cora Soft</span>
                </a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <div class="fixed bottom-1/3 md:-bottom-3 right-3 transform -translate-y-1/2 z-50">
        <a href="#"
            class="inline-flex items-center gap-2 p-1.5 md:p-2 bg-white shadow-lg rounded-full hover:text-gray-900 dark:hover:text-white dark:bg-gray-800">
            <img class="h-[40px] md:h-[50px] aspect-square object-contain rounded-full border border-gray-300 hover:scale-110 transition-transform"
                src="{{ asset('assets/icons/telegram.png') }}" alt="Chat with us" />
            {{-- <span class="text-balance text-gray-800 dark:text-gray-200">Chat With Us</span> --}}
        </a>
    </div>

</body>

</html>
