@extends('layouts.client_librari')
@section('content')
  <!-- Start Banner -->
  <div class=" mt-[87px] ">
    <a href="/">
        <img class="mx-auto max-h-[300px] w-full object-cover"
            src="{{ asset('assets/images/website_infos/' . $websiteInfo->banner_support) }}" alt="" />
    </a>
</div>

<!-- Start Support -->
<section class="max-w-screen-xl mx-auto mt-10 px-4">
    <div class="mb-12">
        @forelse ($support as $item)
        <p class="text-2xl font-bold text-black "> {{ $item->name }}</p>
        <p class="text-black text-xl my-4">
            {{ $item->short_description }}
        </p>
        @empty

        @endforelse

    </div>
</section>

<!-- End Support -->
@endsection
