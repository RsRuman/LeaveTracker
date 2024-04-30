<div class="relative flex flex-col mt-6 shadow-md bg-clip-border rounded-xl w-96 {{ $statusCount->status->value === 'pending' ? 'bg-orange-500' : ($statusCount->status->value === 'rejected' ? 'bg-red-500' : 'bg-green-500') }}">
    <div class="p-6 text-white rounded p-2">
        <h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-center capitalize">
            {{ $statusCount->status }}
        </h5>
        <p class="block font-sans text-base antialiased leading-relaxed text-inherit text-center font-extrabold mt-8">
            {{ $statusCount->count }}
        </p>
    </div>
</div>
