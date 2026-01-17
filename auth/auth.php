<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function guestOnly() {
    if (isset($_SESSION['user_id'])) {
        header("Location: 404.php");
        exit;
    }
}

function authOnly() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: 404.php");
        exit;
    }
}
function adminOnly() {
    if (!isset($_SESSION['user_id']) || $_SESSION['roll_id'] != 1) {
        header("Location: ../404.php");
        exit;
    }
}