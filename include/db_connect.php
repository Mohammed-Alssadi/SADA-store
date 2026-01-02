<?php
/* 
 |--------------------------------------------------
 | Database Connection File
 | Project: ELECTRO-STORE
 | Using: PDO (PHP Data Objects)
 |--------------------------------------------------
*/

// عرض الأخطاء للتشخيص
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host     = "localhost";
$db_name  = "sada_electro";   // اسم قاعدة البيانات
$username = "root";            // مستخدم MySQL
$password = "12345678";                // كلمة المرور (في XAMPP غالبًا فاضية)

try {
    $conn = new PDO(
        "mysql:host=$host;dbname=$db_name;charset=utf8mb4",
        $username,
        $password
    );

    // إعدادات احترافية
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
?>