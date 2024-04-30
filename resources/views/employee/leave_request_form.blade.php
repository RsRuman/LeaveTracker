@extends('layouts.app')

@section('title')
    Leave Tracker | Leave Request
@endsection

@section('content')
    <div class="mx-auto rounded-md overflow-hidden shadow-md">
        <div class="px-12 py-4">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Leave Request</h2>
            <form action="{{ route('employee.leaveRequest.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Type of Leave</label>
                    <select id="type" name="type" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option selected disabled>Select leave type</option>
                        <option value="casual">Casual Leave</option>
                        <option value="sick">Sick Leave</option>
                        <option value="emergency">Emergency Leave</option>
                    </select>
                    @error('type')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                    <input type="date" id="start_date" name="start_date" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" min="{{ date('Y-m-d') }}">
                    @error('start_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                    <input type="date" id="end_date" name="end_date" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" min="{{ date('Y-m-d') }}">
                    @error('end_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="reason" class="block text-sm font-medium text-gray-700">Reason for Leave</label>
                    <textarea id="reason" name="reason" rows="4" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    @error('reason')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection
