<?php
session_start();
include "db.php";

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check Admin
    $admin_sql = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
    $admin_res = mysqli_query($connection, $admin_sql);

    // Check Customer
    $cust_sql = "SELECT * FROM users WHERE email='$email'";
    $cust_res = mysqli_query($connection, $cust_sql);

    if (mysqli_num_rows($admin_res) > 0) {
        $_SESSION['admin'] = $email;
        header("Location: admin_dashboard.php");
        exit;
    }  
    else if (mysqli_num_rows($cust_res) > 0) {
        $cust = mysqli_fetch_assoc($cust_res);
        if(password_verify($password,$cust['password'])){
            $_SESSION['user_id']=$cust['user_id'];
            $_SESSION['name']= $cust['name'];
        }
        header("Location: customer_home.php");
        exit;
    }
    else {
        $error = "Invalid Email or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Poppins, sans-serif;
    background: linear-gradient(135deg, #7aa6f7, #b8d3ff);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-container {
    width: 350px;
    padding: 25px;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.2);
    text-align: center;
}

h2 {
    margin-bottom: 20px;
    color: #333;
}

input {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border-radius: 12px;
    border: 1px solid #bbb;
    font-size: 15px;
}

input:focus {
    border-color: #007bff;
}

button {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 12px;
    background: #007bff;
    color: white;
    font-size: 16px;
    cursor: pointer;
    margin-top: 10px;
}

button:hover {
    background: #005fcc;
}

.register-link {
    margin-top: 15px;
}

.error {
    color: red;
    font-size: 14px;
}
    </style>
</head>
<body>

<div class="login-container">

    <h2>Login</h2>

    <?php if ($error != ""): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit">Login</button>
    </form>

    <p class="register-link">Don't have an account? <a href="register.php">Register</a></p>
</div>

</body>
</html>