@extends('layouts.admin')

@section('title')
    Leave Tracker | Employee List
@endsection

@section('content')
    @include('components.employee_list_table', ['employees' => $employees])
@endsection
