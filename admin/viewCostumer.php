
 <?php include_once("header.php"); ?>
<div class="container mt-5">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Customer Details</h3>
        <a href="customers.html" class="btn btn-dark">
            <i class="bi bi-arrow-left"></i> Back to Customers
        </a>
    </div>

    <!-- Customer Profile -->
    <div class="card shadow-lg border-0 rounded-4 mb-4">
        <div class="card-body p-4">
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    <img src="assets/imgs/customer01.jpg" class="avatar-lg shadow" alt="Customer">
                </div>
                <div class="col-md-9">
                    <h4 class="fw-bold mb-1">John Doe</h4>
                    <p class="text-muted mb-2">john@example.com</p>

                    <span class="badge bg-success mb-3">Active</span>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <p class="mb-1"><strong>Phone:</strong></p>
                            <p class="text-muted">+1 555 123 456</p>
                        </div>
                        <div class="col-md-4">
                            <p class="mb-1"><strong>Country:</strong></p>
                            <p class="text-muted">United States</p>
                        </div>
                        <div class="col-md-4">
                            <p class="mb-1"><strong>Joined Date:</strong></p>
                            <p class="text-muted">2024-08-15</p>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-outline-primary">
                            <i class="bi bi-pencil"></i> Edit Customer
                        </button>
                        <button class="btn btn-outline-danger ms-2">
                            <i class="bi bi-trash"></i> Delete Customer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Customer Orders Summary -->
    <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Orders Summary</h5>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="p-3 bg-light rounded">
                        <h4 class="fw-bold">18</h4>
                        <p class="text-muted mb-0">Total Orders</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 bg-light rounded">
                        <h4 class="fw-bold">$2,450</h4>
                        <p class="text-muted mb-0">Total Spent</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 bg-light rounded">
                        <h4 class="fw-bold">Delivered</h4>
                        <p class="text-muted mb-0">Last Order Status</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders Table -->
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body table-responsive">
            <h5 class="fw-bold mb-3">Recent Orders</h5>
            <table class="table table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#10245</td>
                        <td>2025-01-10</td>
                        <td>$250</td>
                        <td><span class="badge bg-success">Delivered</span></td>
                        <td>
                            <button class="btn btn-sm btn-info text-white">
                                <i class="bi bi-eye"></i> View
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>#10212</td>
                        <td>2024-12-28</td>
                        <td>$180</td>
                        <td><span class="badge bg-primary">Shipped</span></td>
                        <td>
                            <button class="btn btn-sm btn-info text-white">
                                <i class="bi bi-eye"></i> View
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

 <?php include_once("footer.php"); ?>