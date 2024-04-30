<div class="sidebar">
    <!-- Sidebar content -->
    <div class="mt-6">
        <div class="p-2.5 flex items-center">
            <i class="bi bi-calendar-check px-2 py-1 rounded-md bg-blue-600"></i>
            <h1 class="font-bold text-[15px] ml-3">Leave Tracker</h1>
        </div>
        <div class="my-2 bg-gray-600 h-[1px]"></div>

        <!-- Sidebar menu items -->
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-calendar-plus"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Make A Leave Request</span>
        </div>

        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-list"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Leave Histories</span>
        </div>

        <div class="my-4 bg-gray-600 h-[1px]"></div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-in-right"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Logout</span>
        </div>
    </div>
</div>
