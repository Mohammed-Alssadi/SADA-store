<?php
 include "../include/db_connect.php";

if (!isset($_GET['id'])) {
    header("Location: ProductManagement.php");
    exit;
}

$id = intval($_GET['id']);

$queru = $conn->prepare("SELECT image1,image2,image3 FROM products WHERE id=$id");
$queru->execute();
$p = $queru->fetch();

foreach (['image1','image2','image3'] as $img) {
    if ($p[$img] && file_exists("../uploads/products/" . $p[$img])) {
        unlink("../uploads/products/" . $p[$img]);
    }
}

$conn->query("DELETE FROM products WHERE id=$id");

header("Location: ProductManagement.php");
exit;
