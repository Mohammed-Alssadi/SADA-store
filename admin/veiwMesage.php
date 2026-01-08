

    <?php include ("../include/template/headerAdmin.php") ?>

<div class="container py-4">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Message Details</h3>
        <a href="messages.php" class="btn btn-outline-secondary">Back to Messages</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <!-- Sender Info -->
            <div class="d-flex align-items-center mb-4">
                <img src="assets/imgs/customer01.jpg" width="60" class="rounded-circle me-3">
                <div>
                    <h5 class="mb-0">John Doe</h5>
                    <small class="text-muted">john@example.com</small>
                </div>
                <span class="badge bg-warning ms-auto">Unread</span>
            </div>

            <!-- Message Meta -->
            <div class="mb-3">
                <strong>Subject:</strong> Order Inquiry
            </div>
            <div class="mb-3">
                <strong>Date:</strong> January 12, 2025 – 10:45 AM
            </div>

            <hr>


            <div class="mb-4 message-body">
                <p>Hello Admin,</p>
                <p>I would like to inquire about the delivery status of my recent order. Could you please provide an update?</p>
                <p>Thank you for your support.</p>
                <p>Best regards,<br>John Doe</p>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <button class="btn btn-primary">Reply</button>
                <button class="btn btn-danger">Delete</button>
            </div>

        </div>
    </div>

</div>

 <?php include_once("../include/template/footerAdmin.php"); 

