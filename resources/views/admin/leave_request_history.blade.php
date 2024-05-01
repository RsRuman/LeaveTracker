@extends('layouts.admin')

@section('title')
    Leave Tracker | Leave Histories
@endsection

@section('content')
    @include('components.leave_history_table', ['employeeLeaves' => $employeeLeaves])
    @include('components.leave_request_view_modal')
    @include('components.approve_reject_modal')
@endsection

@section('js')
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/rejectModal.js') }}"></script>
@endsection
