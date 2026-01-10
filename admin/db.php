<?php


// $dbname = "mysql:host=localhost:3307;SADA_electro=tryconnect"; // database type, host, port, and database name
// $user = "root";
// $password = ""; 

// try {
    
//     $connection = new PDO($dbname, $user, $password);
   
// } catch(PDOException $e) {
    
//     echo $e;     
//     echo "<h1 style='color:red'>Failed connection to database</h1>"; 
// }

$conn = new mysqli("localhost:3307", "root", "", "sada_electro1");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


