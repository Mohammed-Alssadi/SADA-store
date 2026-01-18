<?php

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['roll_id'] != 1) {
    header("Location: ../404.php");
    exit;
}
include "../include/db_connect.php";

if (!isset($_GET['id'])) {
    header('Location: categories.php');
    exit;
}

$id = (int) $_GET['id'];

try {
    $stmt = $conn->prepare('SELECT category_img FROM categories WHERE id = :id');
    $stmt->execute(array(':id' => $id));
    
    $p = $stmt->fetch();

    if ($p) {
        foreach (['category_img'] as $img) {
            if (!empty($p[$img]) && file_exists(__DIR__ . '/../uploads/categories/' . $p[$img])) {
                @unlink(__DIR__ . '/../uploads/categories/' . $p[$img]);
            }
        }
    }

    $del = $conn->prepare('DELETE FROM categories WHERE id = :id');
    $del->bindValue(':id', $id, PDO::PARAM_INT);
    $del->execute();

    header('Location: categories.php');
    exit;
} catch (Exception $e) {
    die('Delete failed: ' . htmlspecialchars($e->getMessage()));
}
