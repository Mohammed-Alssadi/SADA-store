

 <?php include ("header.php"); ?>
<div class="container py-4">

    <!-- Page Header -->
    <!-- <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Messages</h3>
        <button class="btn btn-primary">New Message</button>
    </div> -->

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Sender</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="fw-semibold">
                        <td>
                            <img src="assets/imgs/customer01.jpg" width="40" class="rounded-circle me-2">
                            John Doe
                        </td>
                        <td>Order inquiry regarding product delivery...</td>
                        <td>2025-01-12</td>
                        <td><span class="badge bg-warning">Unread</span></td>
                        <td class="text-end">
                            <a href="veiwMesage.php" class="btn btn-sm btn-outline-primary">View</a>
                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <img src="assets/imgs/customer02.jpg" width="40" class="rounded-circle me-2">
                            Sarah Lee
                        </td>
                        <td>Thank you for the fast support!</td>
                        <td>2025-01-11</td>
                        <td><span class="badge bg-success">Read</span></td>
                        <td class="text-end">
                            <a href="veiwMesage.php" class="btn btn-sm btn-outline-primary">View</a>
                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>

 <?php include_once("footer.php"); ?>
