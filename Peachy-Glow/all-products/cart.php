<?php
session_start();

// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตะกร้าสินค้า</title>
</head>
<body>
    <nav>
        <a href="index.php">หน้าหลัก</a>
        <a href="cart.php">🛍️ ดูตะกร้าสินค้า</a>
    </nav>

    <h1>รายการสินค้า</h1>
    <div>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <div>
                <img src="<?= $row['image'] ?>" alt="<?= $row['name'] ?>" width="100">
                <h2><?= $row['name'] ?></h2>
                <p>ราคา: <?= $row['price'] ?> บาท</p>
                <form method="post">
                    <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
                    <button type="submit" name="action" value="add">เพิ่มลงตะกร้า</button>
                </form>
            </div>
        <?php endwhile; ?>
    </div>

    <h2>ตะกร้าสินค้าของคุณ</h2>
    <ul>
        <?php if (!empty($_SESSION['cart'])) : ?>
            <?php foreach ($_SESSION['cart'] as $id => $qty) : ?>
                <li>สินค้า ID: <?= $id ?> | จำนวน: <?= $qty ?>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="product_id" value="<?= $id ?>">
                        <button type="submit" name="action" value="remove">ลบ</button>
                    </form>
                </li>
            <?php endforeach; ?>
        <?php else : ?>
            <li>ตะกร้าว่างเปล่า</li>
        <?php endif; ?>
    </ul>
</body>
</html>

<?php
$conn->close();
?>
