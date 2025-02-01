@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Create Library')" class="p-4" />

        @livewire('library-create')

    </div>
@endsection
