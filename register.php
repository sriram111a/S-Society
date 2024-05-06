<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Replace with your database connection details
    $dbHost = "127.0.0.1:3306";
    $dbUser = "root";
    $dbPassword = "sriram";
    $dbName = "db45";

    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION["username"] = $username;
        header("Location: welcome.php");
        exit();
    } else {
        $error = "Registration failed. Please try again.";
    }

    $stmt->close();
    $conn->close();
}
?>
