@extends('layouts.client_librari')
@section('content')
<!-- Start Banner -->
<div class=" mt-[87px] ">
    <a href="/">
        <img class="mx-auto max-h-[300px] w-full object-cover"
            src="{{ asset('assets/images/website_infos/' . $websiteInfo->banner_academy) }}" alt="" />
    </a>
</div>

<div class="text-center mt-10">
    @forelse ($academy as $item)
    <h2 class="text-4xl font-bold text-black "> {{ $item->name }}</h2>
    <p class="text-black text-xl mt-2">
        {{ $item->short_description }}
    </p>
    @empty

    @endforelse

</div>

<!--Start Video -->
<section class="py-2 antialiased dark:bg-gray-900 ">
    <div class="mx-auto max-w-screen-xl 2xl:px-0">
        <!-- Heading & Filters -->
        <div class="grid grid-cols-2 gap-4 py-2 m-2 lg:py-4 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 sm:gap-2 md:gap-4 lg:gap-4 xl:m-0">
            <!-- Card -->
            @forelse ($videos as $item)
                <div class="block group">
                    <div class="w-full overflow-hidden bg-gray-100 rounded-md dark:bg-neutral-800">
                        {{-- Video Thumbnail --}}
                        <div class="relative w-full overflow-hidden rounded-md">
                            @if ($item->image)
                                <img class="w-full border rounded-md cursor-pointer aspect-[{{ env('VIDEO_ASPECT') }}] group-hover:scale-110 transition-transform duration-500 ease-in-out object-cover rounded-md border"
                                    src="{{ asset('assets/images/videos/'.$item->image) }}" alt="Book Cover" />
                            @else
                                <img class="object-contain w-full p-10 border rounded-md cursor-pointer aspect-video"
                                    src="{{ asset('assets/icons/no-image.png') }}" alt="Book Cover" />
                            @endif

                            {{-- Play Button --}}
                            <div class="absolute inset-0 border size-full">
                                <div class="flex flex-col items-center justify-center size-full">
                                    <a class="inline-flex items-center px-4 py-3 text-sm font-semibold text-gray-800 bg-white border border-gray-200 rounded-full shadow-sm glightbox3 gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"
                                        href="{{ $item->link ? $item->link : asset('assets/videos/'.$item->file) }}">
                                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polygon points="5 3 19 12 5 21 5 3" />
                                        </svg>
                                        Play Video
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Video Title and Short Description --}}
                    <div class="relative pt-2" x-data="{ tooltipVisible: false }">
                        <h3 @mouseenter="tooltipVisible = true" @mouseleave="tooltipVisible = false"
                            class="relative block text-md text-black before:absolute before:bottom-[-0.1rem] before:start-0 before:-z-[1] before:w-full before:h-1 before:transition before:origin-left before:scale-x-0 group-hover:before:scale-x-100 dark:text-white mb-1">
                            <p class="font-medium line-clamp-{{ env('Limit_Line') }}">{{ $item->name }}</p>
                        </h3>

                        {{-- Short Description --}}
                        <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                            {{ Str::limit(preg_replace('/&nbsp;|&[^;]+;/', '', strip_tags($item->description)), 100) }}
                        </p>
                    </div>
                </div>
            @empty
                <p class="p-2">{{ __('messages.noData') }}...</p>
            @endforelse
        </div>
    </div>
</section>
<!-- Ead Video -->
@endsection
