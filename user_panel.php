<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
    <link rel="stylesheet" href="/statics/styles_user_panel.css">
    <script src="/statics/functions.js"></script>
</head>
<?php
$is_logged = $_COOKIE['is_logged'];
$user_id = $_COOKIE['user_id'];
if ($is_logged === 'true' and !is_null($user_id)){
?>
<body>
    <header>
        <h1>TheXnumb's Weblog</h1>
    </header>
    <nav>
        <a href="/user_panel.php">Wellcome <?php echo $_COOKIE['username']?> !</a>
        <a href="#">Panel</a>
        <a href="#">Write</a>
        <a href="#">Posts</a>
        <a href="#">Settings</a>
        <a href="#" onclick="deleteAllCookies();redirect('/login.php')">Logout</a>
    </nav>
    <section>
        <h2>Welcome to Your Panel</h2>
        <p>This is a simple HTML template. You can customize it to suit your needs.</p>
    </section>

<?php 
}else{
?>
 <script>
        // Function to redirect to a URL after a specified time
        function redirectTo(url, delay) {
            setTimeout(function() {
                window.location.href = url;
            }, delay);
        }

        redirectTo("/login.php", 2000);
    </script>
     <p>You will be redirected to Login Page!</p>
<?php
}
?>
<footer>
        <p>&copy; 2024 TheXnumb. All rights reserved.</p>
    </footer>
</body>
</html>