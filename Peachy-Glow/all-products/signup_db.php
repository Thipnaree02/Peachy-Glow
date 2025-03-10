<?php 

    session_start();
    require_once 'connect/db.php';

    if (isset($_POST['signup'])) {
        $c_name = $_POST['c_name'];
        $gender= $_POST['gender'];
        $bday= date('Y-m-d', strtotime($_POST['bday']));
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $urole = 'user';

        if (empty($c_name)) {
            $_SESSION['error'] = 'Please fill in your fullname';
            header("location: signup.php");
            exit();
        } elseif (empty($gender)) {
            $_SESSION['error'] = 'Please choose your gender!';
            header("location: signup.php");
            exit();
        } elseif (empty($email)) {
            $_SESSION['error'] = 'Please fill in email!';
            header("location: signup.php");
            exit();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'Incorrect email format!';
            header("location: signup.php");
            exit();
        } elseif (empty($password)) {
            $_SESSION['error'] = 'Please fill in password!';
            header("location: signup.php");
            exit();
        } elseif (strlen($password) > 20 || strlen($password) < 6) {
            $_SESSION['error'] = 'Password must be between 6 and 20 characters long!';
            header("location: signup.php");
            exit();
        } elseif (empty($c_password)) {
            $_SESSION['error'] = 'Please confirm password!';
            header("location: signup.php");
            exit();
        } elseif ($password !== $c_password) {
            $_SESSION['error'] = 'Password not matching!';
            header("location: signup.php");
            exit();
        } else {
            try {
                $check_email = $conn->prepare("SELECT c_email FROM customer WHERE c_email = :email");
                $check_email->bindParam(":email", $email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row && $row['c_email'] === $email) {
                    $_SESSION['warning'] = "This email already exists! <a href='signin.php'>Click here</a> to login!";
                    header("location: signup.php");
                    exit();
                } else {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO customer(c_name, gender, c_dob, c_address, c_phone, c_email, c_password, urole) 
                                            VALUES(:cname, :gender, :bday, :address, :phone, :email, :password, :urole)");
                    
                    $stmt->bindParam(":cname", $c_name);
                    $stmt->bindParam(":gender", $gender);
                    $stmt->bindParam(":bday", $bday);
                    $stmt->bindParam(":address", $address);
                    $stmt->bindParam(":phone", $phone);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":urole", $urole);
                    
                    $stmt->execute();
                    
                    echo "<script>alert('Congratulations! You have successfully registered.');</script>";
                    header("location: login.php");
                    exit();
                }

            } catch (PDOException $e) {
                echo "Database error: " . $e->getMessage();
            }
        }
    }

?>
