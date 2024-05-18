<?php
include 'header.php';
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
        <button onclick="window.location.href='register.php';">Registration?</button>

    </form>
    <?php
    if (!empty($error_message)) // Corrected: Changed !is_null to !empty
        echo "<p>$error_message</p>";
    
    include 'footer.php';
    ?>