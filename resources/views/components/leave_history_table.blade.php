<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table
                    class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                    <thead
                        class="border-b border-neutral-200 font-medium dark:border-white/10">
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
