<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ฟอร์มเพิ่มข้อมูลสินค้า</title>
</head>

<body>
<h1>ฟอร์มเพิ่มข้อมูลสินค้า</h1>

<form method="post" action="" enctype="multipart/form-data">
    ชื่อสินค้า <input type="text" name="pname" required autofocus><br>
    รายละเอียดสินค้า <textarea name="pdetail" required></textarea><br>
    ราคา <input type="text" name="pprice" required><br>
    รูปภาพสินค้า <input type="file" name="pimage" accept="image/*" required><br>
    <button type="submit">บันทึก</button>
</form>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once("../connectdb.php");

    // รับค่าจากฟอร์ม
    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $pdetail = mysqli_real_escape_string($conn, $_POST['pdetail']);
    $pprice = mysqli_real_escape_string($conn, $_POST['pprice']);

    // อัปโหลดรูปภาพ
    $file_name = $_FILES['pimage']['name'];
    $file_tmp = $_FILES['pimage']['tmp_name'];
    $file_size = $_FILES['pimage']['size'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    // ดึงรหัสสินค้าล่าสุด
    $p_id = 1;
    $result = mysqli_query($conn, "SELECT MAX(p_id) AS max_id FROM products");
    if ($result && $row = mysqli_fetch_assoc($result)) {
        $p_id = is_null($row['max_id']) ? 1 : $row['max_id'] + 1;
    }

    $new_file_name = $p_id . '.' . $file_ext;

    // ตรวจสอบรูปภาพ
    $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($file_ext, $allowed_ext) && $file_size <= 5000000) {
        $upload_dir = "../images/";
        $upload_file = $upload_dir . $new_file_name;

        if (move_uploaded_file($file_tmp, $upload_file)) {
            // บันทึกข้อมูลสินค้าในฐานข้อมูล
            $sql = "INSERT INTO products (p_name, p_detall, p_price, p_ext, c_id) 
                    VALUES ('{$pname}', '{$pdetail}', '{$pprice}', '{$new_file_name}', 1)";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('เพิ่มข้อมูลสินค้าสำเร็จ');</script>";
            } else {
                die('Error: ' . mysqli_error($conn));
            }
        } else {
            echo "<script>alert('อัปโหลดไฟล์ไม่สำเร็จ');</script>";
        }
    } else {
        echo "<script>alert('รูปภาพไม่ถูกต้องหรือมีขนาดใหญ่เกินไป');</script>";
    }
}
?>
</body>
</html>