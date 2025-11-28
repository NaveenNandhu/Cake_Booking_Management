<!DOCTYPE html>
<html>
<head>
    <title>Customize Your Cake</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #ffe6e6;
            margin: 0;
            display: flex;
            justify-content: center;
            padding: 50px;
        }

        .form-container {
            background: white;
            padding: 25px;
            width: 400px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ffb3b3;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #d1476c;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .checkbox-group label {
            display: block;
            margin-top: 5px;
        }

        .btn {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            background: #ff4d6a;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background: #e63950;
        }
    </style>

</head>
<body>

<div class="form-container">
    <h2>Customize Your Cake</h2>

    <form action="save_custom_cake.php" method="POST">

        <label>Cake Shape</label>
        <select name="shape" required>
            <option value="">Select Shape</option>
            <option value="Round">Round</option>
            <option value="Square">Square</option>
            <option value="Heart">Heart</option>
        </select>

        <label>Cake Flavour</label>
        <input type="text" name="flavour" placeholder="Chocolate">

        <label>Weight (KG)</label>
        <input type="number" step="0.5" name="kg" placeholder="1, 1.5, 2..." required>

        <label>Quantity</label>
        <input type="number" name="quantity" placeholder="1, 2..." required>

        <label>Message on Cake</label>
        <input type="text" name="message" placeholder="Happy Birthday...">

        <label>Extra Toppings</label>
        <div class="checkbox-group">
            <label><input type="checkbox" name="toppings[]" value="Cherries"> Cherries</label>
            <label><input type="checkbox" name="toppings[]" value="Nuts"> Nuts</label>
            <label><input type="checkbox" name="toppings[]" value="Fruits"> Fruits</label>
        </div>

        <button type="submit" class="btn">Place Order</button>
    </form>
</div>

</body>
</html>