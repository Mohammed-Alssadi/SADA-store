<?php

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['roll_id'] != 1) {
    header("Location: ../404.php");
    exit;
}
include("../include/db_connect.php");

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: comments.php");
    exit;
}

$id = (int)$_GET['id'];

$conn->prepare("DELETE FROM comments WHERE id=?")->execute([$id]);

header("Location: comments.php");
exit;
