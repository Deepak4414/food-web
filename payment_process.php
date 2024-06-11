<?php
session_start();
$duration = 300;

if (isset($_SESSION['timeout']) && time() - $_SESSION['timeout'] > $duration) {
    session_unset();
    session_destroy();
    $_SESSION = array();
    header("location: menu.html");
    exit();
}

$_SESSION['timeout'] = time();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Process</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f2f2;
            margin: 0;
            padding: 20px;
        }

        .payment-form {
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

        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="payment-form">
        <h1>Enter Credit Card Information</h1>
        <form method="post" action="payment_confirmation.php">
            <input type="text" name="card_name" placeholder="Cardholder Name" required>
            <input type="text" name="card_number" placeholder="Card Number" required>
            <input type="text" name="expiry_date" placeholder="Expiry Date (MM/YY)" required>
            <input type="number" name="cvv" placeholder="CVV" required>
            <input type="submit" value="Submit Payment">
        </form>
    </div>
</body>

</html>
