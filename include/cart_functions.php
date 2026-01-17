<?php
require_once 'db_connect.php';

function cartAdd($user_id, $product_id, $qty = 1) {
    global $conn;

    $stmt = $conn->prepare("
        INSERT INTO cart_items (user_id, product_id, quantity)
        VALUES (?, ?, ?)
        ON DUPLICATE KEY UPDATE quantity = quantity + VALUES(quantity)
    ");

    $stmt->execute([$user_id, $product_id, $qty]);
}

function cartUpdate($user_id, $product_id, $qty) {
    global $conn;

    if ($qty <= 0) {
        cartRemove($user_id, $product_id);
        return;
    }

    $stmt = $conn->prepare(
        "UPDATE cart_items SET quantity=? WHERE user_id=? AND product_id=?"
    );
    $stmt->execute([$qty, $user_id, $product_id]);
}

function cartRemove($user_id, $product_id) {
    global $conn;

    $stmt = $conn->prepare(
        "DELETE FROM cart_items WHERE user_id=? AND product_id=?"
    );
    $stmt->execute([$user_id, $product_id]);
}

function getCartItems($user_id) {
    global $conn;

    $stmt = $conn->prepare("
        SELECT 
            c.product_id,
            c.quantity,
            p.product_name,
            (p.price - p.discount) AS price,
            p.image1
        FROM cart_items c
        JOIN products p ON p.id = c.product_id
        WHERE c.user_id = ?
    ");

    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getCartCount($user_id) {
    global $conn;

    $stmt = $conn->prepare("
        SELECT SUM(quantity) AS total
        FROM cart_items
        WHERE user_id = ?
    ");

    $stmt->execute([$user_id]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'] ?? 0;
}
