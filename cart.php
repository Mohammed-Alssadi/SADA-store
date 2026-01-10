<?php include 'include/template/Header.php'?>


<!-- Cart Page -->
<div class="container py-5 my-5">
    <div class="row g-4">

        <!-- Cart Table -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="img/product-1.png" class="rounded-3 me-3" width="60" alt="">
                                            <div>
                                                <h6 class="mb-1">Apple iPad Mini</h6>
                                                <small class="text-muted">Model: G2356</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$2.99</td>
                                    <td class="text-center">
                                        <div class="input-group input-group-sm mx-auto" style="width:110px;">
                                            <button class="btn btn-outline-secondary">-</button>
                                            <input type="text" class="form-control text-center" value="1">
                                            <button class="btn btn-outline-secondary">+</button>
                                        </div>
                                    </td>
                                    <td class="fw-semibold">$2.99</td>
                                    <td>
                                        <button class="btn btn-sm btn-light text-danger rounded-circle">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="img/product-11.png" class="rounded-3 me-3" width="60" alt="">
                                            <div>
                                                <h6 class="mb-1">Apple iPad Mini</h6>
                                                <small class="text-muted">Model: G2356</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$2.99</td>
                                    <td class="text-center">
                                        <div class="input-group input-group-sm mx-auto" style="width:110px;">
                                            <button class="btn btn-outline-secondary">-</button>
                                            <input type="text" class="form-control text-center" value="1">
                                            <button class="btn btn-outline-secondary">+</button>
                                        </div>
                                    </td>
                                    <td class="fw-semibold">$2.99</td>
                                    <td>
                                        <button class="btn btn-sm btn-light text-danger rounded-circle">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Coupon -->
            <div class="card border-0 shadow-sm rounded-4 mt-4">
                <div class="card-body d-flex flex-column flex-md-row gap-3">
                    <input type="text" class="form-control" placeholder="Coupon Code">
                    <button class="btn btn-primary  btn-sm   px-4">Apply Coupon</button>
                </div>
            </div>
        </div>

        <!-- Cart Summary -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <h5 class="mb-4">Order Summary</h5>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Subtotal</span>
                        <span>$96.00</span>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Shipping</span>
                        <span>$3.00</span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between fw-bold fs-5 mb-4">
                        <span>Total</span>
                        <span>$99.00</span>
                    </div>

                   <a href="cheackout.php" class="btn btn-primary w-100 rounded-pill py-3">Proceed to Checkout</></a>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include 'include/template/Footer.php'?>
