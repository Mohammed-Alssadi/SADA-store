<?php
require_once '../auth/auth.php';
require_once '../include/cart_functions.php';

authOnly();

cartRemove(
    $_SESSION['user_id'],
    (int) $_POST['product_id']
);

echo json_encode(['success' => true]);
