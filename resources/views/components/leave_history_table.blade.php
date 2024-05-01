<div class="flex flex-col">
    <!-- Filters -->
    <div class="flex items-center space-x-4 mb-4">
        <!-- Filter Form -->
        <form action="@if(\Illuminate\Support\Facades\Auth::user()->type === 'employee') {{ route('employee.leaveRequest.histories') }} @else {{ route('admin.employee.leave.histories') }}@endif" method="GET" class="flex items-center">
            <!-- Search Filter -->
            <input type="text" name="search" value="{{ request('search') }}" class="border border-neutral-200 px-3 py-2 rounded-md" placeholder="Reason">

            <!-- Status Filter -->
            <label for="typeFilter" class="ml-2 mr-2">Select Type:</label>
            <select id="typeFilter" name="type" class="border border-neutral-200 px-3 py-2 rounded-md">
                <option value="">All</option>
                <option value="casual" {{ request('type') === 'casual' ? 'selected' : '' }}>Casual</option>
                <option value="sick" {{ request('type') === 'sick' ? 'selected' : '' }}>Sick</option>
                <option value="emergency" {{ request('type') === 'emergency' ? 'selected' : '' }}>Emergency</option>
            </select>

            <!-- Status Filter -->
            <label for="statusFilter" class="ml-2 mr-2">Select Status:</label>
            <select id="statusFilter" name="status" class="border border-neutral-200 px-3 py-2 rounded-md">
                <option value="">All</option>
                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
        </form>

        <!-- Clear Filter Button -->
        <form action="@if(\Illuminate\Support\Facades\Auth::user()->type === 'employee') {{ route('employee.leaveRequest.histories') }} @else {{ route('admin.employee.leave.histories') }}@endif" method="GET">
            <button type="submit" class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Clear Filter</button>
        </form>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                    <!-- Table Header -->
                    <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                    <tr>
                        <th scope="col" class="px-6 py-4">#</th>
                        <th scope="col" class="px-6 py-4">Type</th>
                        <th scope="col" class="px-6 py-4">Start date</th>
                        <th scope="col" class="px-6 py-4">End date</th>
                        <th scope="col" class="px-6 py-4">Reason</th>
                        <th scope="col" class="px-6 py-4">Status</th>
                        <th scope="col" class="px-6 py-4">Actions</th>
                    </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                    @foreach($employeeLeaves as $employeeLeave)
                        <tr class="border-b border-neutral-200 dark:border-white/10">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                            <td class="whitespace-nowrap px-6 py-4 capitalize">{{ $employeeLeave->type }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ date('M d, Y', strtotime($employeeLeave->start_date)) }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ date('M d, Y', strtotime($employeeLeave->end_date)) }}</td>
                            <td class="whitespace-nowrap px-6 py-4 capitalize">{{ substr($employeeLeave->reason, 0, 30) . '...'  }}</td>
                            <td class="whitespace-nowrap px-6 py-4 capitalize
                                {{ $employeeLeave->status->value === 'pending' ? 'text-orange-500' : ($employeeLeave->status->value === 'rejected' ? 'text-red-500' : 'text-green-500') }}">
                                {{ $employeeLeave->status }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 capitalize">
                                <button class="modal-open bg-blue-500 text-white px-2 py-1 rounded"
                                        data-type="{{ $employeeLeave->type }}"
                                        data-start-date="{{ date('M d, Y', strtotime($employeeLeave->start_date)) }}"
                                        data-end-date="{{ date('M d, Y', strtotime($employeeLeave->end_date)) }}"
                                        data-reason="{{ $employeeLeave->reason }}"
                                        data-status="{{ $employeeLeave->status }}">
                                    <i class="bi bi-eye"></i>
                                    View
                                </button>

                                @if(\Illuminate\Support\Facades\Auth::user()->type === 'admin')
                                    @if($employeeLeave->status->value === 'pending')
                                        <button class="modal-open-approved-rejected bg-blue-500 text-white px-2 py-1 rounded"
                                                data-id="{{ $employeeLeave->id }}"
                                                data-status="approved">
                                            <i class="bi bi-check-circle"></i>
                                            Approved
                                        </button>
                                        <button class="modal-open-approved-rejected bg-red-500 text-white px-2 py-1 rounded"
                                                data-id="{{ $employeeLeave->id }}"
                                                data-status="rejected">
                                            <i class="bi bi-x-circle"></i>
                                            Rejected
                                        </button>
                                    @elseif($employeeLeave->status->value === 'approved')
                                        <button class="modal-open-approved-rejected bg-red-500 text-white px-2 py-1 rounded"
                                                data-id="{{ $employeeLeave->id }}"
                                                data-status="rejected">
                                            <i class="bi bi-x-circle"></i>
                                            Rejected
                                        </button>
                                    @else
                                        <button class="modal-open-approved-rejected bg-blue-500 text-white px-2 py-1 rounded"
                                                data-id="{{ $employeeLeave->id }}"
                                                data-status="approved">
                                            <i class="bi bi-check-circle"></i>
                                            Approved
                                        </button>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{ $employeeLeaves->links() }}

