<?php 
require_once 'auth/auth.php';
authOnly();
 include 'include/template/Header.php';
require_once 'include/cart_functions.php';
$cartItems = getCartItems($_SESSION['user_id']);
$subtotal = 0;
?>
<!-- Cart Page -->
<div class="container py-5 my-5 ">
    <div class="row g-4 mb-5 ">
  <?php if ($cartItems): ?>
        <!-- CART TABLE -->
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

                              
                                    <?php foreach ($cartItems as $item):

                                        $total = $item['price'] * $item['quantity'];
                                        $subtotal += $total;
                                    ?>

                                        <tr data-id="<?= $item['product_id'] ?>">

                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="uploads/products/<?= $item['image1'] ?>" class="rounded-3 me-3" width="60">
                                                    <div>
                                                        <h6 class="mb-1"><?= $item['product_name'] ?></h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>$<?= number_format($item['price'], 2) ?></td>

                                            <td class="text-center">

                                                <div class="input-group input-group-sm mx-auto" style="width:110px;">

                                                    <button class="btn btn-outline-secondary" onclick="decreaseQty(<?= $item['product_id'] ?>)">-</button>

                                                    <input type="text" id="qty-<?= $item['product_id'] ?>" class="form-control text-center" value="<?= $item['quantity'] ?>" readonly>

                                                    <button class="btn btn-outline-secondary" onclick="increaseQty(<?= $item['product_id'] ?>)">+</button>


                                                </div>

                                            </td>

                                            <td class="fw-semibold" id="total-<?= $item['product_id'] ?>">
                                                $<?= number_format($total, 2) ?>
                                            </td>

                                            <td>
                                                <button class="btn btn-sm btn-light text-danger rounded-circle"
                                                    onclick="removeFromCart(<?= $item['product_id'] ?>)">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>

                                        </tr>

                                    <?php endforeach; ?>

                            

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <!-- COUPON -->
            <div class="card border-0 shadow-sm rounded-4 mt-4">
                <div class="card-body d-flex flex-column flex-md-row gap-3">
                    <input type="text" class="form-control" placeholder="Coupon Code">
                    <button class="btn btn-primary btn-sm px-4">Apply Coupon</button>
                </div>
            </div>

        </div>


        <!-- SUMMARY -->
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">

                    <h5 class="mb-4">Order Summary</h5>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Subtotal</span>
                       <span id="subtotal">$<?= number_format($subtotal,2) ?></span>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Shipping</span>
                        <span>$3.00</span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between fw-bold fs-5 mb-4">
                        <span>Total</span>
                  <span id="grand-total">$<?= number_format($subtotal+3,2) ?></span>
                    </div>

                    <a href="cheackout.php" class="btn btn-primary w-100 rounded-pill py-3">
                        Proceed to Checkout
                    </a>

                </div>
            </div>

        </div>
        <?php else: ?>
            <div class="container py-5 my-5"> 
                <div class="alert alert-info text-center mt-5 py-5">
                    <p class="display-5">Your cart is empty. </p><a href="index.php" class="alert-link">Continue shopping</a>.
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>

<?php include 'include/template/Footer.php'; ?>


