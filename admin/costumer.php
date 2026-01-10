
 <?php include ("header.php"); ?>
<div class="container-fluid mt-4">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Customers Management</h3>
        <button class="btn btn-dark">
            <i class="bi bi-person-plus"></i> Add Customer
        </button>
    </div>

    <!-- Search & Filter -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-5">
                    <input type="search" class="form-control" placeholder="Search by name or email">
                </div>
                <div class="col-md-4">
                    <select class="form-select">
                        <option selected>All Customers</option>
                        <option>Active</option>
                        <option>Inactive</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-outline-dark w-100">
                        <i class="bi bi-filter"></i> Filter
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Customers Table -->
    <div class="card shadow-lg border-0">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Avatar</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><img src="assets/imgs/customer01.jpg" class="avatar"></td>
                        <td>John Doe</td>
                        <td>john@example.com</td>
                        <td>+1 555 123 456</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td>
                            <button class="btn btn-sm btn-info text-white"> <a href="viewCostumer.php" class="text-decoration-none text-white"><i class="bi bi-eye"></i></a></button>
                            <button class="btn btn-sm btn-warning text-white"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td><img src="assets/imgs/customer02.jpg" class="avatar"></td>
                        <td>Sarah Smith</td>
                        <td>sarah@example.com</td>
                        <td>+44 7700 900123</td>
                        <td><span class="badge bg-secondary">Inactive</span></td>
                        <td>
                            <button class="btn btn-sm btn-info text-white"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-warning text-white"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td><img src="assets/imgs/customer03.jpg" class="avatar"></td>
                        <td>Ahmed Ali</td>
                        <td>ahmed@example.com</td>
                        <td>+967 777 123 456</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td>
                            <button class="btn btn-sm btn-info text-white"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-warning text-white"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
 <?php include_once("footer.php"); ?>
