@extends('layouts.employee')

@section('title')
    Leave Tracker | Leave Histories
@endsection

@section('content')
    @include('components.leave_history_table', ['employeeLeaves' => $employeeLeaves])
    @include('components.leave_request_view_modal')
@endsection
