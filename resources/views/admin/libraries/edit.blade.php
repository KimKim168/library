@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Edit Library')" class="p-4" />

        @livewire('library-edit', [
            'item' => $item,
        ])

    </div>
@endsection
