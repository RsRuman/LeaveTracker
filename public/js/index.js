document.addEventListener('DOMContentLoaded', function () {
    const modalOpenButtons = document.querySelectorAll('.modal-open');
    const modal = document.querySelector('.modal');
    const modalContent = modal.querySelector('.modal-content');

    modalOpenButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            // Get employeeLeave data from the clicked button's data attributes
            const type = button.dataset.type;
            const startDate = button.dataset.startDate;
            const endDate = button.dataset.endDate;
            const reason = button.dataset.reason;
            const status = button.dataset.status;
            const color = button.dataset.status === 'rejected' ? 'red-500' :
                button.dataset.status === 'approved' ? 'green-500' :
                    'orange-500';

            // Populate modal content with employeeLeave data
            modalContent.innerHTML = `
                <div class="py-4 text-left px-6">
                    <div class="flex justify-between items-center pb-3">
                        <p class="text-2xl font-bold uppercase">${type} Leave</p>
                        <div class="modal-close cursor-pointer z-50">
                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                            </svg>
                        </div>
                    </div>
                    <p><span class="font-semibold">Start Date: </span> ${startDate}</p>
                    <p><span class="font-semibold">End Date: </span> ${endDate}</p>
                    <p><span class="font-semibold capitalize">Reason: </span> ${reason}</p>
                    <p><span class="font-semibold">Status: </span> <span class="text-${color} capitalize">${status}</span></p>
                </div>
            `;

            // Show the modal
            modal.classList.remove('opacity-0');
            modal.classList.remove('pointer-events-none');
        });
    });

    // Close modal when clicking the overlay or close button
    modal.addEventListener('click', function (event) {
        if (event.target.closest('.modal-close')) {
            closeModal();
        }
    });

    // Close modal when clicking outside the modal content
    modal.addEventListener('click', function (event) {
        if (!event.target.closest('.modal-content')) {
            closeModal();
        }
    });

    function closeModal() {
        modal.classList.add('opacity-0');
        modal.classList.add('pointer-events-none');
    }
});
