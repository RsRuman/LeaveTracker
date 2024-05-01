document.addEventListener('DOMContentLoaded', function () {
    const modalOpenButtons = document.querySelectorAll('.modal-open-approved-rejected');
    const modal = document.querySelector('.modal-approved-rejected');
    const closeModalButtons = document.querySelectorAll('.modal-close');
    const submitForm = document.getElementById('submitForm');
    const statusInput = document.getElementById('status');

    modalOpenButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            // Show the modal
            modal.classList.remove('opacity-0');
            modal.classList.remove('pointer-events-none');

            // Get employee id and status from the clicked button's dataset
            const employeeId = button.dataset.id;
            const status = button.dataset.status;

            // Set the action and status in the form
            submitForm.action = `/admin/employees/leave-histories/${employeeId}`;
            statusInput.value = status;
        });
    });

    // Close modal when clicking close button
    modal.addEventListener('click', function (event) {
        if (event.target.classList.contains('modal-close') || event.target.classList.contains('bg-gray-900')) {
            closeModal();
        }
    });

    // Close modal when clicking cancel button
    closeModalButtons.forEach(function (closeButton) {
        closeButton.addEventListener('click', function () {
            closeModal();
        });
    });

    function closeModal() {
        modal.classList.add('opacity-0');
        modal.classList.add('pointer-events-none');
    }
});

