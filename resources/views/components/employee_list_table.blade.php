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
                        <th scope="col" class="px-6 py-4">Name</th>
                        <th scope="col" class="px-6 py-4">Email</th>
                        <th scope="col" class="px-6 py-4">Account created at</th>
                        <th scope="col" class="px-6 py-4">Status</th>
                        <th scope="col" class="px-6 py-4">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr class="border-b border-neutral-200 dark:border-white/10">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                            <td class="whitespace-nowrap px-6 py-4 capitalize">{{ $employee->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4 capitalize">{{ $employee->email }}</td>
                            <td class="whitespace-nowrap px-6 py-4 capitalize">{{ date('M d, Y', strtotime($employee->created_at)) }}</td>
                            <td class="whitespace-nowrap px-6 py-4 capitalize
                            {{ $employee->status->value === 'pending' ? 'text-orange-500' : ($employee->status->value === 'blocked' ? 'text-red-500' : 'text-green-500') }}">
                                {{ $employee->status }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 capitalize">
                                @if($employee->status->value === 'pending')
                                    <button class="bg-blue-500 text-white px-2 py-1 rounded">
                                        <i class="bi bi-check-circle"></i>
                                        Approved
                                    </button>
                                @else
                                    <button class="bg-red-500 text-white px-2 py-1 rounded">
                                        <i class="bi bi-x-circle"></i>
                                        Blocked
                                    </button>
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
{{ $employees->links() }}
