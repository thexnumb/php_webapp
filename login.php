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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both username and password are provided
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        // Dummy username and password (Replace this with your actual authentication logic)
        $dummy_username = "thexnumb";
        $dummy_password = "password";

        // Check if the provided credentials match the dummy credentials
        if ($_POST['username'] === $dummy_username && $_POST['password'] === $dummy_password) {
            // Set session variables
            setcookie("is_logged", 'true', time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie("username", $dummy_username, time() + (86400 * 30), "/"); // 86400 = 1 day
            // Redirect to the dashboard or any other authenticated page
            header("Location: user_panel.php");
            exit();
        } else {
            // Invalid credentials
            $error_message = "Invalid username or password. Please try again.";
        }
    } else {
        // Missing username or password
        $error_message = "Please enter both username and password.";
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
        if (!is_null($error_message))
            echo "<p>$error_message</p>";
    ?>
    </div>
<footer>
        <p>&copy; 2024 TheXnumb. All rights reserved.</p>
    </footer>
</body>

</html>