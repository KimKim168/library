@extends('layouts.client_librari')
@section('content')

<!-- Start hero -->
<section class="dark:bg-gray-900 mt-24 light-color-gradient">
    <div class="grid max-w-screen-xl py-5 mx-auto gap-6 lg:gap-8 lg:grid-cols-12 items-center px-4 sm:px-6 lg:px-8">
        <!-- Swiper Section -->
        <div class="lg:col-span-5 h-96 order-2 flex justify-center">
            <div class="w-full max-w-xs h-96 sm:max-w-md mx-auto lg:max-w-full">
                <swiper-container autoplay="true" autoplay-delay="2000" speed="1000" effect="slide"
                    class="mySwiperb  aspect-square w-full h-96" pagination="true" pagination-clickable="true"
                    space-between="20" loop="true">
                    @forelse ($slides as $slide)
                        <swiper-slide class="swiper-slide-item aspect-square h-96 w-full">
                            <a href="{{ asset('assets/images/slides/' . $slide->image) }}"
                                class="aspect-square w-full glightbox">
                                <img class="object-cover aspect-square w-full h-96"
                                    src="{{ asset('assets/images/slides/' . $slide->image) }}"
                                    alt="{{ $slide->alt_text ?? 'Slide Image' }}" />
                            </a>
                        </swiper-slide>
                    @empty
                        <p class="text-gray-500 dark:text-gray-400">No slides available</p>
                    @endforelse
                </swiper-container>
                <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
            </div>
        </div>

        <!-- Content Section -->
        <div class="lg:col-span-7 order-1 text-center lg:text-left">
            @forelse ($homeTop as $item)
                <h1 class="sm:mt-4 md:mt-0 text-2xl sm:text-3xl lg:text-4xl font-bold leading-tight dark:text-white">
                    {{ $item->name }}
                </h1>
                <p class="sm:mt-4 text-sm sm:text-base lg:text-lg text-gray-500 dark:text-gray-400">
                    {{ $item->short_description }}
                </p>
            @empty

            @endforelse


            <!-- Search Section -->
            <form class="w-full mx-auto mt-4">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">
                    Search
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search Your Library" required />
                </div>
                <div class="mt-4 ">
                    <button type="button"
                        class="text-white bg-black hover:bg-slate-700 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5">
                        Register Your New Library
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- End hero -->

<!-- Start Section -->

<div class="mt-10">
    <p class="text-center text-4xl font-bold mb-4">Features</p>
    <div class="max-w-screen-xl mx-auto grid grid-cols-2 lg:grid-cols-4 gap-4 p-4">
        @forelse ($features as $item)
            <a href="{{ $item->link }}"
                class="p-8 text-center justify-center items-center bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600 hover:shadow-lg dark:hover:shadow-lg-light"><img
                    src={{ asset('assets/images/links/' . $item->image) }} class="w-full h-[50px] object-contain" />
                <h3 class="mt-3 text-base md:text-xl text-gray-900 dark:text-white">
                    {{ $item->name }}
                </h3>
            </a>
        @empty

        @endforelse

    </div>
</div>
<!-- End Section -->

<!-- Start Seaction -->
<div class="">
    <div class="max-w-screen-xl mx-auto p-4">
    @forelse ($homeBottom as $item)
    <h1 class="text-4xl font-bold text-black "> {{ $item->name }}</h1>
    <p class="text-black text-xl mt-2">
        {{ $item->short_description }}
    </p>
            @empty
        </div>

    @endforelse


    <div class="max-w-screen-xl mx-auto grid grid-cols-2 lg:grid-cols-6 gap-4 py-4">
        @forelse ($libraries as $item)
            <a mx-autoa href="{{ $item->link }}"
                class="block px-3 py-4 text-center bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600 hover:shadow-lg dark:hover:shadow-lg-light"><img
                    src="{{ asset('assets/images/links/' . $item->image) }}" class="w-16 h-16 object-contain mx-auto" />
                <h3 class="font-semibold text-sm text-gray-900 dark:text-white mt-3.5">
                    {{ $item->name }}
                </h3>
            </a>
        @empty

        @endforelse


    </div>
</div>
<!-- End Seaction -->
@endsection
