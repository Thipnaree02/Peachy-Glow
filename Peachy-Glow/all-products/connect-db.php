<?php
$servername = "localhost";
$username = "root";
$password = "87654321";
$dbname = "shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
} else {
    echo "เชื่อมต่อฐานข้อมูลสำเร็จ!";
}
?>
