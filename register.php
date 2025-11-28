<?php include 'db.php';?>
<!DOCTYPE html>
<html>
<head>
<title>Customer Registration</title>
<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: white;
        font-family: 'Segoe UI', sans-serif;
    }

    .box {
        width: 350px;
        background: white;
        border: 2px solid #6c4ccf;
        border-radius: 15px;
        box-shadow: 0 8px 18px rgba(0,0,0,0.15);
        padding: 25px;
        text-align: center;
    }

    h2 {
        color: #6c4ccf;
        margin-bottom: 15px;
        font-weight: 600;
    }

    /* Input + Textarea – Violet Borders */
    input, textarea {
        width: 90%;
        margin: 7px auto;
        padding: 10px;
        border-radius: 8px;
        border: 2px solid #6c4ccf;   /* VIOLET BORDER */
        outline: none;
        transition: 0.2s;
        display: block;
        font-size: 14px;
    }

    /* Focus Effect */
    input:focus, textarea:focus {
        border-color: #6c4ccf;
        box-shadow: 0 0 6px #c4b3ff;
    }

    button {
        width: 95%;
        padding: 10px;
        margin-top: 10px;
        background: #6c4ccf;
        border: none;
        color: white;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
    }

    a {
        font-size: 14px;
        text-decoration: none;
        margin-top: 10px;
        color: #6c4ccf;
        display: block;
    }
</style>
</head>
<body>

<div class="box">
    <h2>Register</h2>
    <form action="" method="POST">

        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <input type="password" name="password" placeholder="Password" required>
        <textarea name="address" placeholder="Address" required></textarea>

        <button type="submit" name="register">Register</button>

        <a href="login.php">Login</a>
    </form>
</div>

<?php
if(isset($_POST['register'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
    $address=$_POST['address'];

    $q="INSERT INTO users (name,email,phone,password,address) 
        VALUES ('$name','$email','$phone','$password','$address')";

    if(mysqli_query($connection,$q)){
        echo "<script>alert('Registration Successful');location='login.php';</script>";
    } else {
        echo "<script>alert('Error');</script>";
    }
}
?>
</body>
</html>