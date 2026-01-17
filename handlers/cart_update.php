<?php
require_once '../auth/auth.php';
require_once '../include/cart_functions.php';

authOnly();

cartUpdate(
    $_SESSION['user_id'],
    (int) $_POST['product_id'],
    (int) $_POST['qty']
);

echo json_encode(['success' => true]);
