@extends('admin.layouts.admin')
@section('content')
    <div>
        <x-page-header :value="__('Feature')" />
        @livewire('feature-table-data')
    </div>
@endsection
