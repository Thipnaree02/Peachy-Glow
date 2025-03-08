<?php
// เรียกใช้ไฟล์เชื่อมต่อฐานข้อมูล
include('connect-db.php');

if (isset($_GET['p_id'])) {
    echo "p_id ที่ได้รับ: " . $_GET['p_id'] . "<br>";
} else {
    echo "ไม่ได้รับค่า p_id จาก URL!<br>";
}

if (isset($_GET['p_id'])) {
    $p_id = intval($_GET['p_id']);  // รับค่า p_id จาก URL และป้องกัน SQL Injection

    // คำสั่ง SQL ดึงข้อมูลสินค้า
    $sql = "SELECT p_name, p_detail, p_price, p_ext FROM products WHERE p_id = $p_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "ไม่พบสินค้า!";
        exit();
    }
} else {
    echo "ไม่พบรหัสสินค้า!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['p_name']; ?></title>
</head>
<body>
    <h1><?php echo $row['p_name']; ?></h1>
    <p><?php echo $row['p_detail']; ?></p>
    <p>ราคา: <?php echo number_format($row['p_price'], 2); ?> บาท</p>
    <img src="images/<?php echo $row['p_ext']; ?>" alt="<?php echo $row['p_name']; ?>" style="max-width: 400px;">
</body>
</html>