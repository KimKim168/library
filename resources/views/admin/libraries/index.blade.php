@extends('admin.layouts.admin')
@section('content')
    <div>
        <x-page-header :value="__('libraries')" />
        @livewire('library-table-data')
    </div>
@endsection
