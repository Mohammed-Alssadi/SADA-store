<?php

require_once '../auth/auth.php';
require_once '../include/cart_functions.php';

header('Content-Type: application/json');

authOnly();

// التحقق من الطلب
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
    exit;
}

// التحقق من وجود المنتج
if (!isset($_POST['product_id']) || !is_numeric($_POST['product_id'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid product id'
    ]);
    exit;
}

$user_id    = (int) $_SESSION['user_id'];
$product_id = (int) $_POST['product_id'];

try {

    cartAdd($user_id, $product_id);

    echo json_encode([
        'success' => true,
        'message' => 'Product added to cart'
    ]);

} catch (Exception $e) {

    echo json_encode([
        'success' => false,
        'message' => 'Something went wrong'
    ]);
}
