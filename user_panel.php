<?php
include 'header.php';
$is_logged = $_COOKIE['is_logged'];
$user_id = $_COOKIE['user_id'];
if ($is_logged === 'true' and !is_null($user_id)){
?>
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
include 'footer.php';
?>
