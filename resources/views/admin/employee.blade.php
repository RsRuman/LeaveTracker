@extends('layouts.admin')

@section('title')
    Leave Tracker | Employee List
@endsection

@section('content')
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    @include('components.employee_list_table', ['employees' => $employees])
    @include('components.approve_block_modal')
@endsection

@section('js')
    <script src="{{ asset('js/admin.js') }}"></script>
@endsection
