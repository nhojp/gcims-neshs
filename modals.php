<!-- modal.php -->

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content shadow-lg rounded-3">
            <div class="modal-header bg-success text-white border-0">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
            </div>
            <div class="modal-body text-center">
                <!-- Success Icon (Check) -->
                <div class="d-flex justify-content-center align-items-center mb-4">
                    <div class="circle-check success-circle">
                        <i class="fas fa-check-circle fa-3x text-success"></i>
                    </div>
                </div>
                <p class="fs-5 text-muted">Your action was successful!</p>
                <button type="button" class="btn btn-success w-100" data-bs-dismiss="modal" id="closeSuccessModal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content shadow-lg rounded-3">
            <div class="modal-header bg-danger text-white border-0">
                <h5 class="modal-title" id="errorModalLabel">Error</h5>
            </div>
            <div class="modal-body text-center">
                <!-- Error Icon (X) -->
                <div class="d-flex justify-content-center align-items-center mb-4">
                    <div class="circle-check error-circle">
                        <i class="fas fa-times-circle fa-3x text-danger"></i>
                    </div>
                </div>
                <p class="fs-5 text-muted">Something went wrong!</p>
                <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Add some custom styles for the modals -->
<style>
    /* Circle styling for both success and error modals */
    .circle-check {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Green Circle for Success */
    .success-circle {
        background-color: white;
        border: 5px solid #28a745;
        /* Green for success */
    }

    /* Red Circle for Error */
    .error-circle {
        background-color: white;
        border: 5px solid #dc3545;
        /* Red for error */
    }

    .modal-content {
        border-radius: 1rem;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
        border-bottom: none;
    }

    .modal-footer {
        border-top: none;
    }

    .btn-close {
        background: none;
        border: none;
        font-size: 1.5rem;
        color: #fff;
    }
</style>

<!-- Make sure to include FontAwesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- Add JavaScript to refresh the page when success modal is closed -->
<script>
    // Add event listener to refresh the page after success modal is closed
    var successModal = document.getElementById('successModal');

    // Refresh the page after modal is completely closed
    successModal.addEventListener('hidden.bs.modal', function() {
        // Set sessionStorage flag before reload
        sessionStorage.setItem('dataSubmitted', 'true');
        window.location.href = window.location.href; // This will navigate to the current page (refreshes it)
    });
</script>