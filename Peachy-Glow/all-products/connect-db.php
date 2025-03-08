<?php
// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

$conn = new mysqli($servername, $username, $password, $dbname);

// เช็คการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับ p_id จาก URL
$product_id = isset($_GET['p_id']) ? intval($_GET['p_id']) : 0;

// ดึงข้อมูลสินค้าจากฐานข้อมูล
$sql = "SELECT p_name, p_detail, p_price, p_ext FROM products WHERE p_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

// ตรวจสอบว่ามีสินค้าไหม
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row['p_name']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($row['p_name']); ?></h1>
    <p><?php echo nl2br(htmlspecialchars($row['p_detail'])); ?></p>
    <p>Price: $<?php echo number_format($row['p_price'], 2); ?></p>
    <img src="images/<?php echo htmlspecialchars($row['p_ext']); ?>" alt="<?php echo htmlspecialchars($row['p_name']); ?>">
</body>
</html>

<?php
} else {
    echo "<p>Product not found!</p>";
}

$conn->close();
?>

