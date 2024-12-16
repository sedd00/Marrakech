<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $guests = $_POST['guests'];

    // Connect to a MySQL database (example)
    $conn = new mysqli('localhost', 'username', 'password', 'database');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO reservations (name, email, phone, date, time, guests) VALUES ('$name', '$email', '$phone', '$date', '$time', '$guests')";

    if ($conn->query($sql) === TRUE) {
        echo "Thank you, your reservation has been received!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    // Optional: Send a confirmation email
    // mail($email, "Reservation Confirmation", "Your reservation is confirmed for $date at $time.");
}
?>
