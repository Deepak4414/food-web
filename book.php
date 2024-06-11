<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // User's input
    $name = $_POST['name'];
    $email = $_POST['email'];
    $party = $_POST['party-size'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    if (!empty($name) && !empty($email) && !empty($party) && !empty($date) && !empty($time)) {
        $query = "SELECT * FROM booking WHERE date='$date' AND time='$time'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);

        $tables_available = 10; 
        if ($rows < $tables_available) {
            $user_id = random_num(20);
            $query = "INSERT INTO booking (name, email, size, date, time) VALUES ('$name', '$email', '$party', '$date', '$time')";
            mysqli_query($con, $query);
            header("Location: booking.html");
            die;
        } else {
            echo "The selected time slot is fully booked. Please choose a different time.";
        }
    } else {
        echo "Please enter valid information in all fields!";
    }
}
?>
