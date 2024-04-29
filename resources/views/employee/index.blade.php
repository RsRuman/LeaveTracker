@extends('layouts.app')

@section('title')
    Leave Tracker | Dashboard
@endsection

@section('content')
    <h1>Employee Dashboard</h1>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
@endsection
