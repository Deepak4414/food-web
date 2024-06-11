<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f2f2;
            margin: 0;
            padding: 20px;
        }

        .payment-details {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .item-purchased {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .payment-button {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }

        .payment-button:hover {
            background-color: #45a049;
            cursor: pointer;
        }

        .address-form {
            display: none;
            margin-top: 20px;
        }

        .address-form.visible {
            display: block;
        }

        .address-form label {
            display: block;
            margin-bottom: 5px;
        }

        .address-form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        .address-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="payment-details">
        <h1>Payment Details</h1>
        <div class="item-purchased">
            <?php
            if (isset($_GET['item'])) {
                $itemPurchased = $_GET['item'];
                echo "<p>You've purchased: <strong>$itemPurchased</strong></p>";
            }
            ?>
        </div>
        <a href="#" onclick="showAddressForm()">Add Address</a>

        <form action="payment_process.php" method="post" class="address-form" id="addressForm">
            <h2>Address Details</h2>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>

            <label for="zip">ZIP Code:</label>
            <input type="text" id="zip" name="zip" required>

            <input type="submit" value="Proceed to Payment">
        </form>
    </div>

    <script>
        function showAddressForm() {
            document.getElementById("addressForm").classList.add('visible');
        }
    </script>
</body>

</html>
