 <?php include('include/template/Header.php')?>



 


<!-- Checkout Page -->
<div class="container py-5">
    <div class="row g-4">

        <!-- LEFT: Customer & Shipping -->
        <div class="col-lg-7">
            <div class="card border-0 shadow rounded-4 mb-4">
                <div class="card-body">
                    <h5 class="mb-4">Shipping Information</h5>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Last Name" required>
                        </div>
                        <div class="col-12">
                            <input type="email" class="form-control" placeholder="Email Address" required>
                        </div>
                        <div class="col-12">
                            <input type="tel" class="form-control" placeholder="Phone Number" required>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" placeholder="Street Address" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="City" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Postal Code" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment -->
            <div class="card border-0 shadow rounded-4">
                <div class="card-body">
                    <h5 class="mb-4">Payment Method</h5>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="payment" id="card" checked>
                        <label class="form-check-label" for="card">Credit / Debit Card</label>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="payment" id="paypal">
                        <label class="form-check-label" for="paypal">PayPal</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" id="cod">
                        <label class="form-check-label" for="cod">Cash on Delivery</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT: Order Summary -->
        <div class="col-lg-5">
            <div class="card border-0 shadow rounded-4 " style="top:100px;">
                <div class="card-body">
                    <h5 class="mb-4">Order Summary</h5>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Products</span>
                        <span>$1134.00</span>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Shipping</span>
                        <span>$15.00</span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between fw-bold fs-5 mb-4">
                        <span>Total</span>
                        <span>$1149.00</span>
                    </div>

                    <button class="btn btn-primary w-100 rounded-pill py-3 text-uppercase">
                        Place Order
                    </button>

                    <p class="text-muted text-center mt-3 mb-0" style="font-size:13px;">
                        Secure checkout · SSL encrypted
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Checkout Page End -->

    

    <!-- Footer Start -->
    <?php include('include/template/Footer.php')?>