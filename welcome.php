<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <?php
    session_start();
    
    // Check if the user is logged in (session exists)
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        echo "<h2>Welcome, $username!</h2>";
        echo "<p>This is a secure page for logged-in users.</p>";
        echo '<a href="logout.php">Logout</a>';
    } else {
        // Redirect to the login page if the user is not logged in
        header("Location: login.html");
        exit();
    }
    ?>
</body>
</html>
