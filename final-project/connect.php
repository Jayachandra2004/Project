<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "login";
$conn = new mysqli($host, $user, $pass, $db);

// Check if there was an error connecting to the database
if ($conn->connect_error) {
    // Display an error message if the connection fails
    echo "Failed to connect DB: " . $conn->connect_error;
} else {
    // Assuming you have form data to insert into the database, for example:
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL statement to insert data into the database
    $sql = "INSERT INTO users (firstName, lastName, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        // If data insertion is successful, redirect to lobby.html
        header("Location: lobby.html");
        exit();
    } else {
        // If there was an error with the SQL query, display an error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
