<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['roll_id'] != 1) {
    header("Location: ../404.php");
    exit;
}
include "../include/db_connect.php";

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = (int)$_GET['id'];
    $status = (int)$_GET['status'];
    
    try {
        $stmt = $conn->prepare("UPDATE users SET status = ? WHERE id = ?");
        $stmt->execute([$status, $id]);
        header("Location: customers.php?success=1");
        exit();
    } catch (PDOException $e) {
        die("خطأ في تحديث الحالة: " . $e->getMessage());
    }
} else {
    header("Location: customers.php");
    exit();
}
?>
