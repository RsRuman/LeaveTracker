<div class="fixed top-0 left-0 w-full h-full flex items-center justify-center modal-approved-blocked opacity-0 pointer-events-none">
    <div class="absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-full md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-header flex justify-between items-center px-6 py-4">
            <h2 class="text-lg font-semibold">Confirmation</h2>
            <button type="button" class="btn-close modal-close">&times;</button>
        </div>

        <div class="approved-blocked-modal-content py-4 px-6">
            <p>Are you sure?</p>
        </div>

        <div class="modal-footer flex justify-end items-center px-6 py-4">
            <button type="button" class="modal-close bg-blue-500 text-white rounded px-4 py-2 mr-2">Cancel</button>
            <form id="submitForm" method="POST" action="">
                @csrf
                <input type="hidden" name="status" id="status">
                <button type="submit" id="submitBtn" class="bg-green-500 text-white rounded px-4 py-2">Submit</button>
            </form>
        </div>
    </div>
</div>

