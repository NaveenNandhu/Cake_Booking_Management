<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    echo "User not logged in!";
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT name, email, phone, address FROM users WHERE user_id='$user_id'";
$result = mysqli_query($connection, $sql);
$user = mysqli_fetch_assoc($result);

// UPDATE process
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $update_sql = "UPDATE users SET 
                    name='$name', 
                    email='$email', 
                    phone='$phone', 
                    address='$address' 
                   WHERE user_id='$user_id'";

    if (mysqli_query($connection, $update_sql)) {
        echo "<script>alert('Details Updated Successfully!'); window.location='profile.php';</script>";
    } else {
        echo "Error updating: " . mysqli_error($connection);
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
    font-family: Arial, sans-serif;
    background: #f4f4f4;
}

.edit-box {
    width: 40%;
    margin: 50px auto;
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
}

.edit-box h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #444;
}

input[type="text"],
input[type="email"] {
    width: 100%;
    padding: 12px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
}

textarea {
    width: 100%;
    padding: 12px;
    margin-top: 8px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

.btn-update {
    background: #6c4ccf;
    color: white;
    padding: 12px;
    width: 100%;
    border: none;
    margin-top: 15px;
    font-size: 18px;
    border-radius: 6px;
    cursor: pointer;
}

.btn-update:hover {
    background: #563bc8;
}
</style>
</head>
<body>

<div class="edit-box">
    <h2>Edit Your Details</h2>

    <form method="POST">

        <input type="text" name="name" value="<?php echo $user['name']; ?>" placeholder="Enter Name" required>

        <input type="email" name="email" value="<?php echo $user['email']; ?>" placeholder="Enter Email" required>

        <input type="text" name="phone" value="<?php echo $user['phone']; ?>" placeholder="Enter Phone Number" required>

        <textarea name="address" placeholder="Enter Address" required><?php echo $user['address']; ?></textarea>

        <button type="submit" name="update" class="btn-update">Update Details</button>

    </form>
</div>

</body>
</html>