<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Cake</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: white; 
            font-family: "Segoe UI", sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 380px;
            background: white;
            padding: 30px;
            border: 2px solid #7d3cff;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(125, 60, 255, 0.2);
            margin-top: 40px;
        }

        h2 {
            text-align: center;
            color: #7d3cff;
            margin-bottom: 20px;
        }

        label {
            color: #7d3cff;
            font-weight: 600;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #7d3cff;
            border-radius: 10px;
            outline: none;
            margin-top: 5px;
            margin-bottom: 15px;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #7d3cff;
            border: none;
            color: white;
            font-size: 17px;
            border-radius: 12px;
            cursor: pointer;
        }

        button:hover {
            background: #5a1cff;
        }

        /* SUCCESS BOX */
        .success-box {
            margin-top: 20px;
            width: 380px;
                  
            padding: 15px;
            border-radius: 10px;
            color: #155724;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Add Cake</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        <label>Flavour:</label>
        <input type="text" name="flavour" required>

        <label>Description:</label>
        <textarea name="description" rows="3" required></textarea>

        <label>Price:</label>
        <input type="number" name="price" required>

        <label>Upload Image:</label>
        <input type="file" name="image" required>

        <button type="submit" name="submit">Add Cake</button>
    </form>
</div>

<?php
$conn = mysqli_connect("localhost","root","","cake_shop");

if(isset($_POST['submit'])) {

    $flavour = $_POST['flavour'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $imageName = $_FILES['image']['name'];
    $tempName  = $_FILES['image']['tmp_name'];
    $uploadPath = "uploads/" . $imageName;

    move_uploaded_file($tempName, $uploadPath);

    $sql = "INSERT INTO cakes (flavour, description, price, image)
            VALUES ('$flavour', '$description', '$price', '$uploadPath')";

    if(mysqli_query($conn, $sql)) {
        echo "<div class='success-box'>Cake added successfully!</div>";
    } else {
        echo "<p style='text-align:center; color:red;'>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

<a href="admin_dashboard.php">
<button class="back">Back</button></a>
</body>
</html>