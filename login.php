<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="/statics/styles_login.css">
</head>
<body>
<?php
include 'db/db.php';
$error_message = ""; // Initialize error message variable
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid_username = $_POST['username']; // Corrected: Added single quotes around 'username'
    $valid_password = $_POST['password']; // Corrected: Added single quotes around 'password'
    $sql = "SELECT * FROM users WHERE username = '$valid_username' AND password = '$valid_password'";
    // Corrected: Added single quotes around $valid_username and $valid_password
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        setcookie("is_logged", 'true', time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie("username", $row['username'], time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie("user_id", $row['user_id'], time() + (86400 * 30), "/"); // 86400 = 1 day
        header("Location: user_panel.php");
        exit(); // Added to stop further execution after redirection
    } else {
        // Invalid credentials
        $error_message = "Invalid username or password. Please try again.";
    }
}
?>

<div class="login-container">
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    <?php
    if (!empty($error_message)) // Corrected: Changed !is_null to !empty
        echo "<p>$error_message</p>";
    ?>
</div>
<footer>
    <p>&copy; 2024 TheXnumb. All rights reserved.</p>
</footer>
</body>
</html>
